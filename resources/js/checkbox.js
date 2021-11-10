$("#checkbox-parent").change((e)=>{
    $(".checkbox-child").prop('checked',$("#"+e.target.id).prop('checked'))
});