const { isEmpty, isUndefined } = require("lodash");

$(document).ready(()=>{
    // console.log(datas);
    const selector = $('.selector');
    let datas = [];
    if (typeof selectorData !== 'undefined') {
        datas = selectorData
    }
    let i = 0
    if(datas.length > 0){
        selector.each((index, item)=>{
            const selectorId = '#' + $(item).attr('id')
    
            const inputSearch = selectorId + ' input[type=search]'
            const inputHidden = selectorId + ' input[type=hidden]'
            const selectorOption = selectorId + ' option'
            const selectorContent = selectorId + ' .selector__content'
    
            datas[i].forEach(element => {
                $(selectorContent).append(`<option class="selector__item" value="${element.id}">${element.name}</option>`)
            });
    
            updateSelectorItem(inputSearch,datas[i],selectorContent,selectorOption,inputHidden)
            // $(inputSearch).keyup((e)=>{
            //     console.log(datas[i]);
            //     updateSelectorItem(e.target.value, datas[i])
            // })
    
            
    
            $(selectorOption).click((e)=>{
                $(inputSearch).val(e.target.innerHTML)
                $(inputHidden).val(e.target.value)
            })
    
            $(inputSearch).focus(()=>{
                $(selectorId).addClass("show")
            })
            $(inputSearch).focusout(()=>{
                $(selectorId).removeClass("show")
            })
    
            i++
        })
    }
});

function updateSelectorItem(inputSearch,oldData,selectorContent,selectorOption,inputHidden){
    $(inputSearch).keyup((e)=>{
        let newData = oldData.filter((data)=>{
            return data.name.toUpperCase().includes(e.target.value.toUpperCase())
        })

        $(selectorContent).text('')
        newData.forEach(element => {
            $(selectorContent).append(`<option class="selector__item" value="${element.id}">${element.name}</option>`)
        });

        $(selectorOption).click((e)=>{
            $(inputSearch).val(e.target.innerHTML)
            $(inputHidden).val(e.target.value)
        })
        if(isEmpty($(inputSearch).val())) $(inputHidden).val('')
    })
}