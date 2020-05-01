<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css"
        integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,700,700i%7CMaitree:200,300,400,600,700&amp;subset=latin-ext"
        rel="stylesheet">

    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="shortcut icon" type="image/x-icon" href="./images/favicon.ico">
    <link href="{{ asset('css/plugins/webslides/webslides.css') }}" rel="stylesheet">

    <title>TWP Infoboard</title>
</head>

<body>
    <main role="main">
        <article id="webslides" class="horizontal">
            <!-- Slide 1 -->
            <section>
                <div>
                    <h1>Frühschicht <span id="date"></span></h1>

                    <h2>Profilieren</h2>
                    <br>
                </div>

                <table class="table" id="example">
                    <thead>
                        <tr role="row">
                            <th scope="col">Maschine</th>
                            <th scope="col">Mitarbeiter</th>
                            <th scope="col">Artikel</th>
                        </tr>
                    </thead>
                    <tbody>


                    </tbody>
                </table>


                </table>
            </section>
            <!-- Slide 2 -->
            <section>
                <div>
                    <p>
                        <h1>Spätschicht <span id="date2"></span></h1>
                    </p>
                </div>
                <span>
                    <h2>Profilabteilung</h2>
                </span>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">First</th>
                            <th scope="col">Last</th>
                            <th scope="col">Handle</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Larry</td>
                            <td>the Bird</td>
                            <td>@twitter</td>
                        </tr>
                    </tbody>
                </table>
            </section>

            <!-- Slide 3 -->
            <section>
                <div>
                    <p>
                        <h1>Nachtschicht <span id="date3"></span></h1>
                    </p>
                </div>
                <span>
                    <h2>Profilabteilung</h2>
                </span>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">First</th>
                            <th scope="col">Last</th>
                            <th scope="col">Handle</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Larry</td>
                            <td>the Bird</td>
                            <td>@twitter</td>
                        </tr>
                    </tbody>
                </table>
            </section>
            <!-- Slide 4 -->
            <section>
                <div style="align-content: center;">
                    <h1>News</h1>
                </div>
            </section>
        </article>
    </main>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/plugins/webslides/webslides.min.js') }}" ></script>
  
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script>

        let ws;
        window.ws = new Webslides({ autoslide: 10000 }); // Slide every 5 seconds

        $(document).ready(function () {
            $('#example').DataTable({
                ajax: './workers.json',
                paging: false,
                searching: false,
                ordering: false,
                autoWidth: false,
                footerCallback: false
            });
 

            var today = new Date();
            var dd = String(today.getDate()).padStart(2, '0');
            var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
            var yyyy = today.getFullYear();

            today = dd + '.' + mm + '.' + yyyy;

            document.getElementById('date').innerHTML = today;
            document.getElementById('date2').innerHTML = today;
            document.getElementById('date3').innerHTML = today;
        });
    </script>

</body>

</html>