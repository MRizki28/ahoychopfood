<div class="max-w-screen-xl p-4 mx-auto">
    <div class="text-center" data-aos="fade-up" data-aos-duration="1000">
        <h2 class="font-dosisBold text-[40px] text-red-600 underline" >OUR MENU</h2>
        <div class="mt-4 flex justify-center">
            <p class="font-dosisBold text-gray-600 text-[18px] w-[80%]">Kami membantu anda dengan menyajikan makanan nikmat yang
                tentunya
                akan membuat suasana hati anda menjadi lebih baik sepanjang hari.</p>
        </div>
    </div>

    {{-- card desktop --}}
    <div data-aos="fade-right" data-aos-duration="1000">
        <div class="grid grid-cols-1 mt-5 md:gap-y-10  gap-3 md:grid-cols-2" >
            @for ($i = 1; $i <= 6; $i++)
                <div
                    class="pt-6 pb-6 pl-5 pr-5 bg-[#F7F7F7] border flex flex-col transition-all duration-200 ease-in-out transform  translate-x-0 translate-y-0 border-gray-300 hover:shadow-2xl hover:bg-white hover:translate-y-1" >
                    <div>
                        <div class="md:flex space-x-5">
                            <div class="flex justify-center ">
                                <img src="{{ asset('assets/FE/img/menu2.webp') }}" alt="menu1" width="167"
                                    height="167">
                            </div>
                            <div class="space-y-7">
                                <div class="font-dosisBold text-[24px]">
                                    <span>Ahoy Spicy Chicken</span>
                                </div>
                                <div class="font-dosisReguler text-gray-500 text-[18px]">
                                    <p>It is a long established fact that a reader will be distracted read.</p>
                                </div>
                            </div>
                            <div class="font-dosisSemiBold text-red-600 text-[24px]">
                                <span>15K</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endfor
        </div>
    </div>

    <div class="font-dosisBold text-[18px] text-white flex justify-center mt-10">
        <button class="border bg-red-600 rounded-xl p-3 ">Order Here</button>
    </div>
</div>
