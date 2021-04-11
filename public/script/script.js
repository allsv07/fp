window.onload = function () {
    let button = document.querySelector("#btn_birth");

    button.onclick = function (evt) {
        evt.preventDefault();
        let year = document.querySelector("#date_birth").value;

        /*** функция Запроса на сервер ***/
        async function postData(url = '', data) {
            const response = await fetch(url, {
                method: 'POST',
                body: data
            });
            return await response.json();
        }

        postData('', year).then(data => {
            document.querySelector(".count_user > strong").innerText = data.length;
            console.log(data);
            let list = '';

            for (let i = 0; i < data.length; i++) {
                list += '<tr>' +
                '<td>'+data[i]['id']+'</td>' +
                '<td>'+data[i]['first_name']+'</td>' +
                '<td>'+data[i]['last_name']+'</td>' +
                '<td>'+data[i]['bdate']+'</td>' +
                '</tr>';
            }

            document.querySelector("tbody").innerHTML = list;
        })
    }
};