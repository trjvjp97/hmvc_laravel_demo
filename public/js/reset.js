
function clickOtpInput(e) {
    e.firstChild.focus();
    document.getElementById(e.firstChild.id).value = '';
}
function changeInput(tb) {
    if(Number(tb.id)<6){
        let value =document.getElementById(tb.id).value;
        if(value==='') return;
        let input = document.getElementById(Number(tb.id) + 1);
        input.focus();
        input.value='';
    }

}

