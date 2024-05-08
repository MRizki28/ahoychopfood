import { stripHtmlTags } from "./helper";


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

    const fetchData = async () => {
        try {
            isLoading = true;
            const response = await fetch(`v1/menu?page=${page}`);
            const responseData = await response.json();
            const data = responseData.data;

            console.log(data);

            const loading = document.querySelector("#loading");
            loading.innerHTML = loadingTemplate;

            setTimeout(() => {
                if (data == undefined) {
                    loading.innerHTML =
                        datanotfountTemplate;
                    isLoading = false;
                } else {
                    data.data.forEach(product => {
                        const newItem = document.createElement('div');
                        newItem.classList.add('pt-6', 'pb-6', 'pl-5', 'pr-5', 'bg-[#F7F7F7]',
                            'border', 'flex',
                            'flex-col', 'transition-all', 'duration-200', 'ease-in-out',
                            'transform',
                            'translate-x-0', 'translate-y-0', 'border-gray-300',
                            'hover:shadow-2xl',
                            'hover:bg-white', 'hover:translate-y-1');
                        newItem.innerHTML = `
                        <div>
                            <div class="md:flex space-x-5">
                                <div class="flex justify-center">
                                    <img src="img_menu/${product.img_menu}" alt="${product.title}" width="100" height="100">
                                </div>
                                <div class="space-y-7">
                                    <div class="font-dosisBold text-[24px]">
                                        <span>${product.title}</span>
                                    </div>
                                    <div class="font-dosisReguler text-gray-500 text-[18px]">
                                        <p>${stripHtmlTags(product.description)}</p>
                                    </div>
                                </div>
                                <div class="font-dosisSemiBold text-red-600 text-[24px]">
                                    <span>Rp.${product.price}</span>
                                </div>
                            </div>
                        </div>`;
                        document.getElementById('infinite-scroll').appendChild(newItem);
                    });
                    page++;
                    isLoading = false;
                    loading.innerHTML = "";
                }
            }, 2000);
        } catch (error) {
            const loading = document.querySelector("#loading");
            loading.innerHTML = "";
            isLoading = false;
            console.error('Error fetching data:', error);
        }
    }

    function handleScroll() {
        const element = document.getElementById('infinite-scroll');
        const {
            scrollTop,
            scrollHeight,
            clientHeight
        } = element;
        if (scrollTop + clientHeight >= scrollHeight - 5 && !isLoading) {
            fetchData();
        }
    }

    document.getElementById('infinite-scroll').addEventListener('scroll', handleScroll);
    fetchData();
});