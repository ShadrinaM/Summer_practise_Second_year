<!DOCTYPE html>
<html lang="en">

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
    <header>
        <img id="logo" src="logooo.bmp" alt="Logo">
        <div class="header_title">База данных фирмы "Happy House"</div>
        <select id="modeSelect">
            <option value="addRecords">ADD RECORDS</option>
            <option value="dbQueries">DB QUERIES</option>
        </select>
        <button id="toggleThemeBtn" style="font-size: 40px;">☼</button>
    </header>
    <div id="addRecords" class="content">
        <div class="form-buttons">
            <button id="toggleRealtorFormBtn">Add Realtor</button>
            <button id="toggleApartmentFormBtn">Add Apartment</button>
            <button id="toggleBuyerFormBtn">Add Buyer</button>
            <button id="toggleDealFormBtn">Add Deal</button>
        </div>
        <div class="forms-container">
            <form id="addRealtorForm" class="form hidden" action="index.php" method="POST">
                <label>
                    <div class="label_name">Full Name:</div>
                    <br>
                    <input type="text" name="fullNameRealtor" placeholder="Фамилия Имя Отчество" required>
                </label>
                <label>
                    <div class="label_name">Commission Percentage:</div>
                    <br>
                    <input type="number" step="0.01" name="commissionPercentage" placeholder="Процент вознаграждения"
                        required>
                </label>
                <label>
                    <div class="label_name">Phone:</div>
                    <br>
                    <input type="tel" name="phoneRealtor" pattern="^\+[0-9]{11,14}$" placeholder="+7(___)-__-__-___"
                        required>
                </label>
                <label>
                    <div class="label_name">Email:</div>
                    <br>
                    <input type="email" name="emailRealtor" placeholder="email" required>
                </label>
                <button type="submit">Add Realtor</button>
            </form>

            <form id="addApartmentForm" class="form hidden">
                <label>
                    <div class="label_name">Street:</div>
                    <br>
                    <input type="text" name="street">
                </label>
                <label>
                    <div class="label_name">House Number:</div>
                    <br>
                    <input type="number" name="houseNumber">
                </label>
                <label>
                    <div class="label_name">Apartment Number:</div>
                    <br>
                    <input type="number" name="apartmentNumber">
                </label>
                <label>
                    <div class="label_name">Floor:</div>
                    <br>
                    <input type="number" name="floor">
                </label>
                <label>
                    <div class="label_name">Area:</div>
                    <br>
                    <input type="number" name="area">
                </label>
                <label>
                    <div class="label_name">Rooms Count:</div>
                    <br>
                    <input type="number" name="roomsCount">
                </label>
                <label>
                    <div class="label_name">Price:</div>
                    <br>
                    <input type="number" name="price">
                </label>
                <button type="submit">Add Apartment</button>
            </form>

            <form id="addBuyerForm" class="form hidden">
                <label>
                    <div class="label_name">Full Name:</div>
                    <br>
                    <input type="text" name="fullName">
                </label>
                <label>
                    <div class="label_name">Budget:</div>
                    <br>
                    <input type="number" name="budget">
                </label>
                <label>
                    <div class="label_name">Preferences:</div>
                    <br>
                    <input type="text" name="preferences">
                </label>
                <label>
                    <div class="label_name">Phone:</div>
                    <br>
                    <input type="tel" name="phone" pattern="^\+[0-9]{11,14}$">
                </label>
                <label>
                    <div class="label_name">Email:</div>
                    <br>
                    <input type="email" name="email">
                </label>
                <label>
                    <div class="label_name">Passport Data:</div>
                    <br>
                    <input type="text" name="passportData">
                </label>
                <button type="submit">Add Buyer</button>
            </form>

            <form id="addDealForm" class="form hidden">
                <label>
                    <div class="label_name">Deal Date:</div>
                    <br>
                    <input type="date" name="dealDate">
                </label>
                <label>
                    <div class="label_name">Deal Price:</div>
                    <br>
                    <input type="number" name="dealPrice">
                </label>
                <label>
                    <div class="label_name">Apartment ID:</div>
                    <br>
                    <input type="number" name="apartmentId">
                </label>
                <label>
                    <div class="label_name">Buyer ID:</div>
                    <br>
                    <input type="number" name="buyerId">
                </label>
                <label>
                    <div class="label_name">Realtor ID:</div>
                    <br>
                    <input type="number" name="realtorId">
                </label>
                <button type="submit">Add Deal</button>
            </form>
        </div>
        <div class="bottom-left-text">
            <?php echo($sms) ?>
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