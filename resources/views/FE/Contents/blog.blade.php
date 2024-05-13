<div>
    <div class="max-w-screen-xl mb-24 p-4 mx-auto md:mt-24">
        <div class="text-center" data-aos="fade-up" data-aos-duration="1000">
            <h2 class="font-dosisBold text-[40px] text-red-600 underline">Information</h2>
            <h4 class="font-dosisBold text-[20px] text-gray-600 ">Our service means satisfy</h2>
        </div>
        <div class="overflow-auto max-h-[30rem]  grid grid-cols-1 mt-9 gap-4 md:gap-3 md:grid-cols-3"
            id="infinite-scroll-information">

        </div>
        <div id="loading-information">

        </div>
    </div>
</div>


<!-- Open the modal using ID.showModal() method -->
<dialog id="blogModal" class="modal">
    <div class="modal-box max-w-screen-lg">
        <div class="p-5">
            <div class="flex space-x-3">
                <a href="#" onclick="blogModal.showModal()" >
                    <img src="" id="img_information" width="387" height="387" alt="blog">
                </a>
                <div class="w-4/5">
                    <p id="description_detail" class="font-dosisReguler text-[18px]">
                    </p>
                </div>
            </div>
        </div>
    </div>
    <form method="dialog" class="modal-backdrop">
        <button>close</button>
    </form>
</dialog>
