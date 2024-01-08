<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ</title>
    <!-- Add Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5/5vF4CwT463AJ2KG7RbLxDyqXDwZTJAxTt0YI/2p0NZQ8eGHKFdVQbE" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1 class="my-5">Frequently Asked Questions</h1>

        <!-- Start Accordion -->
        <div class="accordion" id="accordionExample">
            <!-- Question 1 -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Bagaimana cara menginstal bootstrap di proyek saya?
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <p>Anda dapat menginstal bootstrap di proyek Anda melalui npm dengan menjalankan perintah berikut:</p>
                        <pre><code>npm install bootstrap</code></pre>
                        <p>Selanjutnya, Anda dapat mengimport bootstrap ke file CSS Anda dengan menambahkan baris berikut:</p>
                        <pre><code>@import '~bootstrap/dist/css/bootstrap.min.css';</code></pre>
                    </div>
                </div>
            </div>
            <!-- Question 2 -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Apa saja fungsi utama dari bootstrap?
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <ul>
                            <li>Flexible, adaptable grid system</li>
                            <li>Styled HTML elements</li>
                            <li>Styled typography</li>
                            <li>Extensive pre-built components</li>
                            <li>Utility classes</li>
                            <li>JavaScript plugins</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Tambahkan question lain disini -->
        </div>
        <!-- End Accordion -->
    </div>

    <!-- Add Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gybBud7j95YCZGQC2B7YPwYxdG1Rbw3IqYbTcZKUtB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous"></script>
</body>

</html>