<div>
    <div class="max-w-screen-xl mb-24 p-4 mx-auto md:mt-24">
        <div class="text-center" data-aos="fade-up" data-aos-duration="1000">
            <h2 class="font-dosisBold text-[40px] text-red-600 underline">Information</h2>
            <h4 class="font-dosisBold text-[20px] text-gray-600 ">Our service means satisfy</h2>
        </div>
        <div class="grid grid-cols-1 mt-9 gap-4 md:gap-3 md:grid-cols-3">
            @for ($i = 1; $i <= 6; $i++)
                <div class="space-y-4 text-center" data-aos="flip-left" data-aos-duration="1000">
                    <div>
                        <a href="#" onclick="blogModal.showModal()">
                            <img src="{{ asset('assets/FE/img/blog1.jpeg') }}" width="387" height="387"
                                alt="blog">
                        </a>
                    </div>
                    <div>
                        <h2 class="font-dosisBold text-[26px]">PROMO OPENING</h2>
                    </div>
                    <div>
                        <p>Nikmati promo sekarang hanya 5k per menu...</p>
                    </div>
                </div>
            @endfor
        </div>
    </div>
</div>


<!-- Open the modal using ID.showModal() method -->
<dialog id="blogModal" class="modal">
    <div class="modal-box max-w-screen-lg">
        <div class="p-5">
            <div class="flex space-x-3">
                <a href="#" onclick="blogModal.showModal()">
                    <img src="{{ asset('assets/FE/img/blog1.jpeg') }}" width="387" height="387" alt="blog">
                </a>
                <div class="w-4/5">
                    <p id="description_detai" class="font-dosisReguler text-[18px]">It is a long established fact that a
                        reader will be distracted by the readable content of a page
                        when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal
                        distribution of letters, as opposed to using 'Content here, content here', making it look like
                        readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as
                        their default model text, and a search for 'lorem ipsum' will uncover many web sites still in
                        their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on
                        purpose (injected humour and the like).</p>
                </div>
            </div>
        </div>
    </div>
    <form method="dialog" class="modal-backdrop">
        <button>close</button>
    </form>
</dialog>
