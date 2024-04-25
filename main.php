<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Happy House</title>
    <link rel="icon" type="image/png" href="logooo.bmp">
    <link rel="stylesheet" href="styles.css">
    <style>
        /**/
    </style>
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
                <div class="title_queries">Шаблонные запросы к базе данных:</div>
                <div class="Query">
                    <div class="query_name">
                        (1) Выбирает из таблицы Apartments (КВАРТИРЫ) информацию от 3-комнатных квартирах, расположенных
                        на улице "Садовая"
                    </div>
                    <button onclick="executeQuery(1)" class="button_select"> Выполнить запрос 1</button>
                </div>
                <div class="Query">
                    <div class="query_name">
                        (2)Выбирает из таблицы Realtors (РИЭЛТОРЫ) информацию о риэлторах, для которых фамилия
                        начинается
                        с
                        буквы "И" и
                        процент вознаграждения больше 10
                    </div>
                    <button onclick="executeQuery(2)" class="button_select"> Выполнить запрос 2</button>
                </div>
                <div class="Query">
                    <div class="query_name">
                        (3) Выбирает из табоицы Apartments (КВАРТИРЫ) информацию об 1-комнатных квартирах, цена на
                        которые
                        находится в
                        диапазоне от 900000 до 1000000
                    </div>
                    <button onclick="executeQuery(3)" class="button_select"> Выполнить запрос 3</button>
                </div>
                <div class="Query">
                    <div class="query_name">
                        (4) Выбирает из таблицы Apartments (КВАРТИРЫ) информацию о квартирах с некоторым количеством
                        комнат.
                        Конкретное
                        количество комнат вводится при выполнении запроса.
                    </div>
                    <label>
                        Число комнат:
                        <input type="number" id="roomsCountInput">
                    </label>
                    <button onclick="executeQuery(4)" class="button_select">Выполнить запрос 4</button>
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
                    <button onclick="executeQuery(5)" class="button_select"> Выполнить запрос 5</button>
                </div>
                <div class="Query">
                    <div class="query_name">
                        (6) Вычисляет для каждой оформленной сделки размер коммиссионного вознаграждения риэлтора.
                        Включает поля ФИО риэлтора, Дата сделки, Цена квартиры, Процент вознаграждения, Комиссионные.
                        Значения в поле Комиссионные вычисляются по формуле: Комиссионные = Цена квартиры * Процент
                        вознаграждения
                    </div>
                    <button onclick="executeQuery(6)" class="button_select"> Выполнить запрос 6</button>
                </div>
                <div class="Query">
                    <div class="query_name">
                        (7) Выполняет группировку по полю Количество комнат. Для каждой группы вычисляет среднее
                        значение по полю Площадь квартиры.
                    </div>
                    <button onclick="executeQuery(7)" class="button_select"> Выполнить запрос 7</button>
                </div>
                <div class="Query">
                    <div class="query_name">
                        (8) Выполняет группировку по полю Площадь квартиры. Для каждой группы вычисляет наибольшее и
                        наименьшее значение по полю Количество комнат.
                    </div>
                    <button onclick="executeQuery(8)" class="button_select"> Выполнить запрос 8</button>
                </div>
            </div>
            <div class="output-container">
                <div class="output">
                    HiHiHiHiHiHiHiHiHiHiHiHiHiHiHiHiHiHiHiHiHiHiHiHiHiiHiHiHiHiHiHiHiHiHiHiHiHiHiHi
                </div>
            </div>
        </div>


    </div>

    <script>
        /*открытие полей добавления записей в бд*/
        document.getElementById('modeSelect').addEventListener('change', function () {
            var selectedMode = this.value;
            var addRecordsDiv = document.getElementById('addRecords');
            var dbQueriesDiv = document.getElementById('dbQueries');

            addRecordsDiv.classList.toggle('hidden', selectedMode !== 'addRecords');
            dbQueriesDiv.classList.toggle('hidden', selectedMode !== 'dbQueries');
        });

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
    </script>
</body>

</html>