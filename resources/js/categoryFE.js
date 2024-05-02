import $ from 'jquery';

$(document).ready(function () {
    getAllData()
    function getAllData() {
        $.ajax({
            type: "GET",
            url: "v1/category",
            dataType: "json",
            success: function (response) {
                response.data.forEach(function (category, index) {
                    $('#img_category_' + (index + 1)).attr('src', "img_category/" + category.img_category)
                    $('#category_' + (index + 1)).text(category.category);
                })
            },
            error: function (xhr, status, error) {
                console.error("Error:", error);
            }
        });
    }
});