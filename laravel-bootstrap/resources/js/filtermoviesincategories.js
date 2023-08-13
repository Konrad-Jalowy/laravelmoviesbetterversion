console.log("hi");
console.log("hi");
let form = document.querySelector("#filter-form");
let select = document.querySelector("#filter");
console.log(form);
console.log(select);


select.addEventListener('change', function(){
    console.log("onchangeevent");
    let url = new URL(form.action);
    console.log(url);
    if(url.href.includes("?"))
    {
        console.log("not implemented");
    }
    else
    {   console.log("else block");
        // url.searchParams.append(select.value);
        // url += select.value;
        console.log(select.value);
        // form.action = url.href;
        // console.log(url);
        // form.submit();
    }
});