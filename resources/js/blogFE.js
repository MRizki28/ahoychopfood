import { decodeEntities, stripHtmlTags, truncateString } from './helper';

document.addEventListener("DOMContentLoaded", function () {
    let page = 1;
    let isLoading = false;

    const loadingTemplate = `
    <div id="loading" class="flex justify-center items-center mt-4 text-gray-500">
        Loading...
    </div>`;

    const datanotfountTemplate = `
    <div id="no-data" class="flex justify-center items-center mt-4 text-gray-500">
        Data not found
    </div>`;

    const openModal = (id, data) => {
        const modal = document.querySelector('#blogModal');
        const selectedItem = data.data.find(item => item.id === id);
        console.log(selectedItem)
        const imgElement = modal.querySelector('#img_information');
        const descriptionElement = modal.querySelector('#description_detail');

        imgElement.src = "img_information/" + selectedItem.img_information;
        const decodeDscription = decodeEntities(selectedItem.description);
        descriptionElement.textContent = stripHtmlTags(decodeDscription);

        modal.showModal();
    }

    const setupImageClickListeners = (data) => {
        const images = document.querySelectorAll('#infinite-scroll-information img');
        images.forEach(img => {
            img.addEventListener('click', function () {
                const id = this.getAttribute('data-id');
                openModal(id, data);
            });
        });
    }

    const getData = async () => {
        try {
            isLoading = true;
            const response = await fetch(`v1/information?page=${page}`)
            const responseData = await response.json();
            const data = responseData.data
            console.log(data)

            const loading = document.querySelector("#loading-information");
            loading.innerHTML = loadingTemplate;

            setTimeout(() => {
                if (data == undefined) {
                    loading.innerHTML = datanotfountTemplate
                    isLoading = false;
                } else {
                    data.data.forEach((item, index) => {
                        const newItem = document.createElement('div');
                        newItem.innerHTML = `
                            <div class="space-y-4 text-center" data-aos="flip-left" data-aos-duration="1000">
                                <div>
                                <img src="img_information/${item.img_information}" class="w-96 h-96 cursor-pointer" 
                                alt="blog" data-id="${item.id}">
                                </div>
                                <div class="mt-auto">
                                    <h2 class="font-dosisBold text-[26px]">${item.title}</h2>
                                </div>
                                <div class="mt-auto">
                                    <p>${stripHtmlTags(truncateString(item.description))}</p>
                                </div>
                            </div>
                        `;
                        document.querySelector('#infinite-scroll-information').appendChild(newItem)
                    });
                    page++
                    isLoading = false
                    loading.innerHTML = "";
                    setupImageClickListeners(data);
                }
            }, 2000)
        } catch (error) {
            const loading = document.querySelector("#loading-information");
            loading.innerHTML = "";
            isLoading = false;
            console.error('Error fetching data:', error);
        };
    }
    function handleScroll() {
        const element = document.querySelector('#infinite-scroll-information');
        const {
            scrollTop,
            scrollHeight,
            clientHeight
        } = element;
        if (scrollTop + clientHeight >= scrollHeight - 5 && !isLoading) {
            getData();
        }
    }

    document.querySelector('#infinite-scroll-information').addEventListener('scroll', handleScroll);
    getData();
})
