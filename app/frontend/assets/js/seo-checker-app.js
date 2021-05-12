"use strict";

$(function ($) {
    const inputIdList = {
        url: 'urlInput',
    }

    const jq = {
        id: id => $(`#${id}`),
        class: cls => $(`.${cls}`)
    }

    /*jq.id(inputIdList.url).on('input', ($input) => {
        const target = $input.target;
        const currentValue = target.value;
        const http = 'http://';
        const https = 'https://'

        if (!currentValue.includes(http) || !currentValue.includes(https) || currentValue !== '') {

            $(target).val(http + currentValue);

        }
    });*/

});