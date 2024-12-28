document.addEventListener('DOMContentLoaded', ()=>{
    const dropdownItems = document.querySelectorAll('#searchModel ~ .dropdown-menu .dropdown-item');
    const dropdownButton = document.getElementById('searchModel');
    dropdownItems.forEach(item=>
    {
        item.addEventListener('click', ()=>
        {
            dropdownButton.textContent = item.textContent;
        }
        );

    });
});

document.addEventListener('DOMContentLoaded', ()=>{
    const dropdownItems = document.querySelectorAll('#searchColor ~ .dropdown-menu .dropdown-item');
    const dropdownButton = document.getElementById('searchColor');
    dropdownItems.forEach(item=>
    {
        item.addEventListener('click', ()=>
        {
            dropdownButton.textContent = item.textContent;
        }
        );

    });
});

document.addEventListener('DOMContentLoaded', ()=>{
    const dropdownItems = document.querySelectorAll('#searchSize ~ .dropdown-menu .dropdown-item');
    const dropdownButton = document.getElementById('searchSize');
    dropdownItems.forEach(item=>
    {
        item.addEventListener('click', ()=>
        {
            dropdownButton.textContent = item.textContent;
        }
        );

    });
});