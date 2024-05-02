<div class="max-w-screen-xl p-4 mx-auto">
    <div class="text-center">
        <h2 class="font-dosisBold text-[48px]">Kategori</h2>
        <span class="text-gray-600 text-[18px]">Terdapat banyak kategori jenis makanan dan minuman yang dapat membuat
            anda terngiang - ngiang</span>
    </div>

    <div class="grid grid-cols-2 mt-9 gap-2 md:gap-0 md:grid-cols-4">
        @for ($i = 1; $i <= 4; $i++)
            <div class="flex justify-center items-center flex-col text-center">
                <img class="rounded-lg" src="" id="img_category_{{ $i }}" width="255" height="255" alt="category1">
                <span class="text-[30px] font-dosisBold mt-auto" id="category_{{ $i }}"></span>
            </div>
        @endfor
    </div>
</div>