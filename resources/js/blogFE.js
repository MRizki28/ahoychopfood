import $ from 'jquery';
import { insertLineBreaks } from './helper';


$(document).ready(function () {
    let descriptionDetail = $('#description_detail')

    let text = descriptionDetail.text();
    let newText = insertLineBreaks(text, 30);

    descriptionDetail.html(newText);
});