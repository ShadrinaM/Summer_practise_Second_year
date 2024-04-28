<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Happy House</title>
    <link rel="icon" type="image/png" href="logooo.bmp">
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <header> <img id="logo" src="logooo.bmp" alt="Логотип">
        <div class="header_title">База данных фирмы "Happy House"</div> <select id="modeSelect">
            <option value="addRecords">ДОБАВИТЬ ЗАПИСИ</option>
            <option value="dbQueries">ЗАПРОСЫ К БД</option>
        </select> <button id="toggleThemeBtn" style="font-size: 40px;">☼</button>
    </header>
    <div id="addRecords" class="content">
        <div class="form-buttons">
            <button id="toggleRealtorFormBtn">Добавить риэлтора</button>
            <button id="toggleApartmentFormBtn">Добавить квартиру</button>
            <button id="toggleBuyerFormBtn">Добавить покупателя</button>
            <button id="toggleDealFormBtn">Добавить сделку</button>
        </div>
        <div class="forms-container">
            <form id="addRealtorForm" class="form hidden" action="index.php" method="POST"> <label>
                    <div class="label_name">Фамилия Имя Отчество:</div> <br>
                    <input type="text" name="fullNameRealtor" placeholder="Иванов Иван Иванович" required>
                </label>
                <label>
                    <div class="label_name">Процент вознаграждения:</div> <br>
                    <input type="number" step="0.01" name="commissionPercentage" placeholder="3.05" required>
                </label>
                <label>
                    <div class="label_name">Телефон:</div> <br>
                    <input type="tel" name="phoneRealtor" pattern="^\+[0-9]{11,14}$" placeholder="+7(999)-999-99-99"
                        required>
                </label>
                <label>
                    <div class="label_name">Электронная почта:</div> <br>
                    <input type="email" name="emailRealtor" placeholder="example@mail.ru" required>
                </label>
                <button type="submit" name="add_realtor_form">Добавить риэлтора</button>
            </form>
            <form id="addApartmentForm" class="form hidden" action="index.php" method="POST">
                <label>
                    <div class="label_name">Название улицы:</div> <br>
                    <input type="text" name="street" placeholder="Пушкина">
                </label>
                <label>
                    <div class="label_name">Номер дома:</div> <br>
                    <input type="number" name="houseNumber" placeholder="12">
                </label>
                <label>
                    <div class="label_name">Номер квартиры:</div> <br>
                    <input type="number" name="apartmentNumber" placeholder="34">
                </label>
                <label>
                    <div class="label_name">Этаж:</div> <br>
                    <input type="number" name="floor" placeholder="5">
                </label>
                <label>
                    <div class="label_name">Площадь квартиры:</div> <br>
                    <input type="number" name="area" placeholder="50">
                </label>
                <label>
                    <div class="label_name">Количество комнат:</div> <br>
                    <input type="number" name="roomsCount" placeholder="2">
                </label>
                <label>
                    <div class="label_name">Цена квартиры:</div> <br>
                    <input type="number" name="price" placeholder="3000000">
                </label> <button type="submit" name="add_apartment_form">Добавить квартиру</button>
            </form>
            <form id="addBuyerForm" class="form hidden" action="index.php" method="POST">
                <label>
                    <div class="label_name">ФИО:</div> <br>
                    <input type="text" name="fullNameBuyer" placeholder="Петров Петр Петрович">
                </label>
                <label>
                    <div class="label_name">Бюджет:</div> <br>
                    <input type="number" name="budget" placeholder="2500000">
                </label>
                <label>
                    <div class="label_name">Пожелания:</div> <br>
                    <input type="text" name="preferences" placeholder="2-х комнатная квартира, не ниже 3-го этажа">
                </label>
                <label>
                    <div class="label_name">Телефон:</div> <br>
                    <input type="tel" name="phoneBuyer" pattern="^\+[0-9]{11,14}$" placeholder="+7(999)-999-99-99">
                </label>
                <label>
                    <div class="label_name">Email:</div> <br>
                    <input type="email" name="emailBuyer" placeholder="example@mail.ru">
                </label>
                <label>
                    <div class="label\_name">Паспортные данные:</div> <br>
                    <input type="text" name="passportData" placeholder="Серия и номер паспорта">
                </label>
                <button type="submit" name="add_buyer_form">Добавить покупателя</button>
            </form>
            <form id="addDealForm" class="form hidden" action="index.php" method="POST">
                <label>
                    <div class="label\_name">Дата сделки:</div> <br>
                    <input type="date" name="dealDate">
                </label>
                <label>
                    <div class="label\_name">Цена сделки:</div> <br>
                    <input type="number" name="dealPrice" placeholder="2700000">
                </label>
                <label>
                    <div class="label\_name">ID Риэлтора:</div> <br>
                    <input type="number" name="realtorId" placeholder="1XXX">
                </label>
                <label>
                    <div class="label\_name">ID Квартиры:</div> <br>
                    <input type="number" name="apartmentId" placeholder="2XXX">
                </label>
                <label>
                    <div class="label\_name">ID Покупателя:</div> <br>
                    <input type="number" name="buyerId" placeholder="3XXX">
                </label>
                <button type="submit" name="add_deal_form">Добавить сделку</button>
            </form>
        </div>
    </div>

    <div id="dbQueries" class="content hidden">
        <div class="queries-container">
            <div class="queryDescriptions">
                <div class="title_queries">Базовые запросы к базе данных:</div>
                <button class="button_select" id="button_base_AllRealtors"> Вывести всех риэлторов</button>
                <button class="button_select" id="button_base_AllApartments"> Вывести все квартиры</button>
                <button class="button_select" id="button_base_AllBuyers"> Вывести всех покупателей</button>
                <button class="button_select" id="button_base_AllDeals"> Вывести все сделки</button>
                <div class="title_queries">Шаблонные запросы к базе данных:</div>
                <div class="Query">
                    <div class="query_name">
                        (1) Выбирает из таблицы Apartments (КВАРТИРЫ) информацию о 3-комнатных квартирах, расположенных
                        на улице "Садовая".
                    </div>
                    <button class="button_select" id="button_specific_select_1"> Выполнить запрос 1</button>
                </div>
                <div class="Query">
                    <div class="query_name">
                        (2)Выбирает из таблицы Realtors (РИЭЛТОРЫ) информацию о риэлторах, для которых фамилия
                        начинается с буквы "И" и процент вознаграждения больше 10.
                    </div>
                    <button class="button_select" id="button_specific_select_2"> Выполнить запрос 2</button>
                </div>
                <div class="Query">
                    <div class="query_name">
                        (3) Выбирает из таблицы Apartments (КВАРТИРЫ) информацию об 1-комнатных квартирах, цена на
                        которые находится в диапазоне от 900000 до 1000000.
                    </div>
                    <button class="button_select" id="button_specific_select_3"> Выполнить запрос 3</button>
                </div>
                <div class="Query">
                    <div class="query_name">
                        (4) Выбирает из таблицы Apartments (КВАРТИРЫ) информацию о квартирах с некоторым количеством
                        комнат. Конкретное количество комнат вводится при выполнении запроса.
                    </div>
                    <label>
                        Число комнат:
                        <input type="number" id="roomsCountInput">
                    </label>
                    <button class="button_select" id="button_specific_select_4"> Выполнить запрос 4</button>
                </div>
                <div class="Query">
                    <div class="query_name">
                        (5) Выбирает из таблицы Apartments (КВАРТИРЫ) информацию обо всех 2-комнатных квартирах, площадь
                        которых есть значение из некоторого диапазона. Нижняя и верхняя границы диапазона задаются при
                        выполнении запроса.
                    </div>
                    <label>
                        Минимальная площадь:
                        <input type="number" id="minAreaInput">
                    </label>
                    <label>
                        Максимальная площадь:
                        <input type="number" id="maxAreaInput">
                    </label>
                    <button class="button_select" id="button_specific_select_5"> Выполнить запрос 5</button>
                </div>
                <div class="Query">
                    <div class="query_name">
                        (6) Вычисляет для каждой оформленной сделки размер комиссионного вознаграждения риэлтора.
                        Включает поля ФИО риэлтора, Дата сделки, Цена квартиры, Процент вознаграждения, Комиссионные.
                        Значения в поле Комиссионные вычисляются по формуле: Комиссионные = Цена квартиры * Процент
                        вознаграждения.
                    </div>
                    <button class="button_select" id="button_specific_select_6"> Выполнить запрос 6</button>
                </div>
                <div class="Query">
                    <div class="query_name">
                        (7) Выполняет группировку по полю Количество комнат. Для каждой группы вычисляет среднее
                        значение по полю Площадь квартиры.
                    </div>
                    <button class="button_select" id="button_specific_select_7"> Выполнить запрос 7</button>
                </div>
                <div class="Query">
                    <div class="query_name">
                        (8) Выполняет группировку по полю Площадь квартиры. Для каждой группы вычисляет наибольшее и
                        наименьшее значение по полю Количество комнат.
                    </div>
                    <button class="button_select" id="button_specific_select_8"> Выполнить запрос 8</button>
                </div>
            </div>
            <div class="output-container"
                style="padding: 15px; overflow-y: auto; max-height: calc(100vh - 132px); padding-right: 15px;">
                <div id="results"></div>
            </div>
        </div>
    </div>

    <script>
        /*отрытие только одной формы добавления записей в бд*/
        document.getElementById('modeSelect').addEventListener('change', function () {
            var selectedMode = this.value;
            var addRecordsDiv = document.getElementById('addRecords');
            var dbQueriesDiv = document.getElementById('dbQueries');

            addRecordsDiv.classList.toggle('hidden', selectedMode !== 'addRecords');
            dbQueriesDiv.classList.toggle('hidden', selectedMode !== 'dbQueries');
        });
        /*открытие полей добавления записей в бд*/
        document.getElementById('toggleRealtorFormBtn').addEventListener('click', function () {
            document.getElementById('addRealtorForm').classList.toggle('hidden');
            document.getElementById('addApartmentForm').classList.add('hidden');
            document.getElementById('addBuyerForm').classList.add('hidden');
            document.getElementById('addDealForm').classList.add('hidden');
        });
        document.getElementById('toggleApartmentFormBtn').addEventListener('click', function () {
            document.getElementById('addRealtorForm').classList.add('hidden');
            document.getElementById('addApartmentForm').classList.toggle('hidden');
            document.getElementById('addBuyerForm').classList.add('hidden');
            document.getElementById('addDealForm').classList.add('hidden');
        });
        document.getElementById('toggleBuyerFormBtn').addEventListener('click', function () {
            document.getElementById('addRealtorForm').classList.add('hidden');
            document.getElementById('addApartmentForm').classList.add('hidden');
            document.getElementById('addBuyerForm').classList.toggle('hidden');
            document.getElementById('addDealForm').classList.add('hidden');
        });
        document.getElementById('toggleDealFormBtn').addEventListener('click', function () {
            document.getElementById('addRealtorForm').classList.add('hidden');
            document.getElementById('addApartmentForm').classList.add('hidden');
            document.getElementById('addBuyerForm').classList.add('hidden');
            document.getElementById('addDealForm').classList.toggle('hidden');
        });


        /*замена лого и включение тёмной темы*/
        document.getElementById('toggleThemeBtn').addEventListener('click', function () {
            document.body.classList.toggle('dark-theme');
            if (document.body.classList.contains('dark-theme')) {
                document.getElementById("logo").src = "logooo_dark.bmp";
            } else {
                document.getElementById("logo").src = "logooo.bmp";
            }
        });


        var cssTable = `
        <style>
        table {
            border: 1px solid;
        }
        table th,
        table td {
            padding: 15px;
            text-align: center;
            border: 1px solid;
        }
        </style>
        `;
        /* обработчик кнопки button_base_AllRealtors */
        //Realtors (Realtor_ID, Full_Name, Commission_Percentage, Phone, Email)
        document.getElementById('button_base_AllRealtors').addEventListener('click', function () {
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'base_query_AllRealtors.php', true);
            xhr.onload = function () {
                if (xhr.status === 200) {
                    var results = JSON.parse(xhr.responseText);
                    var html = cssTable + '<table border="1">';
                    html += '<tr><th>ID Риэлтора</th><th>ФИО</th><th>Процент вознаграждения</th><th>Телефон</th><th>Электронная почта</th></tr>';
                    for (var i = 0; i < results.length; i++) {
                        html += '<tr>';
                        html += '<td>' + results[i].Realtor_ID + '</td>';
                        html += '<td>' + results[i].Full_Name + '</td>';
                        html += '<td>' + results[i].Commission_Percentage + '%</td>';
                        html += '<td>' + results[i].Phone + '</td>';
                        html += '<td>' + results[i].Email + '</td>';
                        html += '</tr>';
                    }
                    html += '</table>';
                    document.getElementById('results').innerHTML = html;
                } else {
                    console.log('Ошибка запроса. Статус ' + xhr.status);
                }
            };
            xhr.send();
        });
        /* обработчик кнопки button_base_AllApartments */
        //Apartments (Apartment_ID, Street, House_Number, Apartment_Number, Floor, Area, Rooms_Count, Price)
        document.getElementById('button_base_AllApartments').addEventListener('click', function () {
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'base_query_AllApartments.php', true);
            xhr.onload = function () {
                if (xhr.status === 200) {
                    var results = JSON.parse(xhr.responseText);
                    var html = cssTable + '<table border="1">';
                    html += '<tr><th>ID Квартиры</th><th>Название улицы</th><th>Номер дома</th><th>Номер квартиры</th><th>Этаж</th><th>Площадь квартиры</th><th>Количество комнат</th><th>Цена квартиры</th></tr>';
                    for (var i = 0; i < results.length; i++) {
                        html += '<tr>';
                        html += '<td>' + results[i].Apartment_ID + '</td>';
                        html += '<td>ул. ' + results[i].Street + '</td>';
                        html += '<td>' + results[i].House_Number + '</td>';
                        html += '<td>' + results[i].Apartment_Number + '</td>';
                        html += '<td>' + results[i].Floor + '</td>';
                        html += '<td>' + results[i].Area + '</td>';
                        html += '<td>' + results[i].Rooms_Count + '</td>';
                        html += '<td>' + results[i].Price + '₽</td>';
                        html += '</tr>';
                    }
                    html += '</table>';
                    document.getElementById('results').innerHTML = html;
                } else {
                    console.log('Ошибка запроса. Статус ' + xhr.status);
                }
            };
            xhr.send();
        });
        /* обработчик кнопки button_base_AllBuyers */
        //Buyers (Buyer_ID, Full_Name, Budget, Preferences, Phone, Email, Passport_Data)
        document.getElementById('button_base_AllBuyers').addEventListener('click', function () {
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'base_query_AllBuyers.php', true);
            xhr.onload = function () {
                if (xhr.status === 200) {
                    var results = JSON.parse(xhr.responseText);
                    var html = cssTable;
                    html += '<style> table th, table td { padding: 10px; } </style>';
                    html += '<table border="1">';
                    html += '<tr><th>ID Покупателя</th><th>ФИО</th><th>Бюджет</th><th>Пожелания</th><th>Телефон</th><th>Электронная почта</th><th>Паспортные данные</th></tr>';
                    for (var i = 0; i < results.length; i++) {
                        html += '<tr>';
                        html += '<td>' + results[i].Buyer_ID + '</td>';
                        html += '<td>' + results[i].Full_Name + '</td>';
                        html += '<td>' + results[i].Budget + '₽</td>';
                        html += '<td>' + results[i].Preferences + '</td>';
                        html += '<td>' + results[i].Phone + '</td>';
                        html += '<td>' + results[i].Email + '</td>';
                        html += '<td>' + results[i].Passport_Data + '</td>';
                        html += '</tr>';
                    }
                    html += '</table>';
                    document.getElementById('results').innerHTML = html;
                } else {
                    console.log('Ошибка запроса. Статус ' + xhr.status);
                }
            };
            xhr.send();
        });
        /* обработчик кнопки button_base_AllDeals */
        //Deals (Deal_ID, Deal_Date, Deal_Price, Apartment_ID, Buyer_ID, Realtor_ID)
        document.getElementById('button_base_AllDeals').addEventListener('click', function () {
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'base_query_AllDeals.php', true);
            xhr.onload = function () {
                if (xhr.status === 200) {
                    var results = JSON.parse(xhr.responseText);
                    var html = cssTable + '<table border="1">';
                    html += '<tr><th>ID Сделки</th><th>Дата сделки</th><th>Цена сделки</th><th>ID Квартиры</th><th>ID Покупателя</th><th>ID Риэлтора</th></tr>';
                    for (var i = 0; i < results.length; i++) {
                        html += '<tr>';
                        html += '<td>' + results[i].Deal_ID + '</td>';
                        html += '<td>' + results[i].Deal_Date + '</td>';
                        html += '<td>' + results[i].Deal_Price + '₽</td>';
                        html += '<td>' + results[i].Apartment_ID + '</td>';
                        html += '<td>' + results[i].Buyer_ID + '</td>';
                        html += '<td>' + results[i].Realtor_ID + '</td>';
                        html += '</tr>';
                    }
                    html += '</table>';
                    document.getElementById('results').innerHTML = html;
                } else {
                    console.log('Ошибка запроса. Статус ' + xhr.status);
                }
            };
            xhr.send();
        });


        /* обработчик кнопки button_specific_select_1 */
        //Apartments (Apartment_ID, Street, House_Number, Apartment_Number, Floor, Area, Rooms_Count, Price)
        document.getElementById('button_specific_select_1').addEventListener('click', function () {
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'specific_query_1.php', true);
            xhr.onload = function () {
                if (xhr.status === 200) {
                    var results = JSON.parse(xhr.responseText);
                    var html = cssTable + '<table border="1">';
                    html += '<tr><th>ID Квартиры</th><th>Название улицы</th><th>Номер дома</th><th>Номер квартиры</th><th>Этаж</th><th>Площадь квартиры</th><th>Количество комнат</th><th>Цена квартиры</th></tr>';
                    for (var i = 0; i < results.length; i++) {
                        html += '<tr>';
                        html += '<td>' + results[i].Apartment_ID + '</td>';
                        html += '<td>ул. ' + results[i].Street + '</td>';
                        html += '<td>' + results[i].House_Number + '</td>';
                        html += '<td>' + results[i].Apartment_Number + '</td>';
                        html += '<td>' + results[i].Floor + '</td>';
                        html += '<td>' + results[i].Area + '</td>';
                        html += '<td>' + results[i].Rooms_Count + '</td>';
                        html += '<td>' + results[i].Price + '₽</td>';
                        html += '</tr>';
                    }
                    html += '</table>';
                    document.getElementById('results').innerHTML = html;
                } else {
                    console.log('Ошибка запроса. Статус ' + xhr.status);
                }
            };
            xhr.send();
        });
        /* обработчик кнопки button_specific_select_2 */
        //Realtors (Realtor_ID, Full_Name, Commission_Percentage, Phone, Email)
        document.getElementById('button_specific_select_2').addEventListener('click', function () {
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'specific_query_2.php', true);
            xhr.onload = function () {
                if (xhr.status === 200) {
                    var results = JSON.parse(xhr.responseText);
                    var html = cssTable + '<table border="1">';
                    html += '<tr><th>ID Риэлтора</th><th>ФИО</th><th>Процент вознаграждения</th><th>Телефон</th><th>Электронная почта</th></tr>';
                    for (var i = 0; i < results.length; i++) {
                        html += '<tr>';
                        html += '<td>' + results[i].Realtor_ID + '</td>';
                        html += '<td>' + results[i].Full_Name + '</td>';
                        html += '<td>' + results[i].Commission_Percentage + '%</td>';
                        html += '<td>' + results[i].Phone + '</td>';
                        html += '<td>' + results[i].Email + '</td>';
                        html += '</tr>';
                    }
                    html += '</table>';
                    document.getElementById('results').innerHTML = html;
                } else {
                    console.log('Ошибка запроса. Статус ' + xhr.status);
                }
            };
            xhr.send();
        });
        /* обработчик кнопки button_specific_select_3 */
        //Realtors (Realtor_ID, Full_Name, Commission_Percentage, Phone, Email)
        document.getElementById('button_specific_select_3').addEventListener('click', function () {
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'specific_query_3.php', true);
            xhr.onload = function () {
                if (xhr.status === 200) {
                    var results = JSON.parse(xhr.responseText);
                    var html = cssTable + '<table border="1">';
                    html += '<tr><th>ID Квартиры</th><th>Название улицы</th><th>Номер дома</th><th>Номер квартиры</th><th>Этаж</th><th>Площадь квартиры</th><th>Количество комнат</th><th>Цена квартиры</th></tr>';
                    for (var i = 0; i < results.length; i++) {
                        html += '<tr>';
                        html += '<td>' + results[i].Apartment_ID + '</td>';
                        html += '<td>ул. ' + results[i].Street + '</td>';
                        html += '<td>' + results[i].House_Number + '</td>';
                        html += '<td>' + results[i].Apartment_Number + '</td>';
                        html += '<td>' + results[i].Floor + '</td>';
                        html += '<td>' + results[i].Area + '</td>';
                        html += '<td>' + results[i].Rooms_Count + '</td>';
                        html += '<td>' + results[i].Price + '₽</td>';
                        html += '</tr>';
                    }
                    html += '</table>';
                    document.getElementById('results').innerHTML = html;
                } else {
                    console.log('Ошибка запроса. Статус ' + xhr.status);
                }
            };
            xhr.send();
        });
        /* обработчик кнопки button_specific_select_4 */
        //Выбирает из таблицы Apartments информацию о квартирах с некоторым количеством комнат. 
        //Конкретное количество комнат вводится при выполнении запроса.
        document.getElementById('button_specific_select_4').addEventListener('click', function () {
            var roomsCountInput = document.getElementById('roomsCountInput').value;
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'specific_query_4.php?roomsCountInput=' + roomsCountInput, true);
            xhr.onload = function () {
                if (xhr.status === 200) {
                    var results = JSON.parse(xhr.responseText);
                    var html = cssTable + '<table border="1">';
                    html += '<tr><th>ID Квартиры</th><th>Название улицы</th><th>Номер дома</th><th>Номер квартиры</th><th>Этаж</th><th>Площадь квартиры</th><th>Количество комнат</th><th>Цена квартиры</th></tr>';
                    for (var i = 0; i < results.length; i++) {
                        html += '<tr>';
                        html += '<td>' + results[i].Apartment_ID + '</td>';
                        html += '<td>ул. ' + results[i].Street + '</td>';
                        html += '<td>' + results[i].House_Number + '</td>';
                        html += '<td>' + results[i].Apartment_Number + '</td>';
                        html += '<td>' + results[i].Floor + '</td>';
                        html += '<td>' + results[i].Area + '</td>';
                        html += '<td>' + results[i].Rooms_Count + '</td>';
                        html += '<td>' + results[i].Price + '₽</td>';
                        html += '</tr>';
                    }
                    html += '</table>';
                    document.getElementById('results').innerHTML = html;
                } else {
                    console.log('Ошибка запроса. Статус ' + xhr.status);
                }
            };
            xhr.send();
        });
        /* обработчик кнопки button_specific_select_5 */
        document.getElementById('button_specific_select_5').addEventListener('click', function () {
            var minAreaInput = document.getElementById('minAreaInput').value;
            var maxAreaInput = document.getElementById('maxAreaInput').value;
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'specific_query_5.php?minAreaInput=' + minAreaInput + '&maxAreaInput=' + maxAreaInput, true);
            xhr.onload = function () {
                if (xhr.status === 200) {
                    var results = JSON.parse(xhr.responseText);
                    var html = cssTable + '<table border="1">';
                    html += '<tr><th>ID Квартиры</th><th>Название улицы</th><th>Номер дома</th><th>Номер квартиры</th><th>Этаж</th><th>Площадь квартиры</th><th>Количество комнат</th><th>Цена квартиры</th></tr>';
                    for (var i = 0; i < results.length; i++) {
                        html += '<tr>';
                        html += '<td>' + results[i].Apartment_ID + '</td>';
                        html += '<td>ул. ' + results[i].Street + '</td>';
                        html += '<td>' + results[i].House_Number + '</td>';
                        html += '<td>' + results[i].Apartment_Number + '</td>';
                        html += '<td>' + results[i].Floor + '</td>';
                        html += '<td>' + results[i].Area + '</td>';
                        html += '<td>' + results[i].Rooms_Count + '</td>';
                        html += '<td>' + results[i].Price + '₽</td>';
                        html += '</tr>';
                    }
                    html += '</table>';
                    document.getElementById('results').innerHTML = html;
                } else {
                    console.log('Ошибка запроса. Статус ' + xhr.status);
                }
            };
            xhr.send();
        });
        /* обработчик кнопки button_specific_select_6 */
        document.getElementById('button_specific_select_6').addEventListener('click', function () {
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'specific_query_6.php', true);
            xhr.onload = function () {
                if (xhr.status === 200) {
                    var results = JSON.parse(xhr.responseText);
                    var html = cssTable + '<table border="1">';
                    html += '<tr><th>ФИО Риэлтора</th><th>Дата сделки</th><th>Цена квартиры</th><th>Процент вознаграждения</th><th>Комиссионные</th></tr>';
                    for (var i = 0; i < results.length; i++) {
                        html += '<tr>';
                        html += '<td>' + results[i].Full_Name + '</td>';
                        html += '<td> ' + results[i].Deal_Date + '</td>';
                        html += '<td> ' + results[i].Price + '₽</td>';
                        html += '<td> ' + results[i].Commission_Percentage + '%</td>';
                        html += '<td> ' + results[i].Commission + '₽</td>';
                        html += '</tr>';
                    }
                    html += '</table>';
                    document.getElementById('results').innerHTML = html;
                } else {
                    console.log('Ошибка запроса. Статус ' + xhr.status);
                }
            };
            xhr.send();
        });
        /* обработчик кнопки button_specific_select_7 */
        document.getElementById('button_specific_select_7').addEventListener('click', function () {
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'specific_query_7.php', true);
            xhr.onload = function () {
                if (xhr.status === 200) {
                    var results = JSON.parse(xhr.responseText);
                    var html = cssTable + '<table border="1">';
                    html += '<tr><th>Количество комнат</th><th>Средняя площадь квартиры</th></tr>';
                    for (var i = 0; i < results.length; i++) {
                        html += '<tr>';
                        html += '<td>' + results[i].Rooms_Count + '</td>';
                        html += '<td> ' + results[i].Average_Area + '</td>';
                        html += '</tr>';
                    }
                    html += '</table>';
                    document.getElementById('results').innerHTML = html;
                } else {
                    console.log('Ошибка запроса. Статус ' + xhr.status);
                }
            };
            xhr.send();
        });
        /* обработчик кнопки button_specific_select_8 */
        document.getElementById('button_specific_select_8').addEventListener('click', function () {
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'specific_query_8.php', true);
            xhr.onload = function () {
                if (xhr.status === 200) {
                    var results = JSON.parse(xhr.responseText);
                    var html = cssTable + '<table border="1">';
                    html += '<tr><th>Площадь квартиры</th><th>Мин.количество комнат</th><th>Макс.количество комнат</th></tr>';
                    for (var i = 0; i < results.length; i++) {
                        html += '<tr>';
                        html += '<td>' + results[i].Area + '</td>';
                        html += '<td> ' + results[i].Min_Rooms + '</td>';
                        html += '<td>' + results[i].Max_Rooms + '</td>';
                        html += '</tr>';
                    }
                    html += '</table>';
                    document.getElementById('results').innerHTML = html;
                } else {
                    console.log('Ошибка запроса. Статус ' + xhr.status);
                }
            };
            xhr.send();
        });
    </script>
</body>

</html>