<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>IPT 302 - SFX</title>
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>
<body>

    <div class="flex min-h-screen">
        <div class="flex-1 flex-col bg-black gap-4">

            @yield('content')

        </div>
        <div class="flex-1 right-side">
            <div class="p-8">
                <button class="bg-orange-800 px-4 py-2 rounded text-white" onClick="toggleInstructions()">
                    General Instructions
                </button>

                <div id="instructions">
                    <h3 class="text-xl">General Instructions</h3>
                    <div class="my-3">
                        Continue from this starter project and perform the following updates:
                        <ul class="list-disc ms-8 flex flex-col gap-4">
                            <li>Implement feedback on login error.</li>
                            <li>
                                Implement the register function.
                            </li>
                            <li>
                                Everytime a registration
                                process is finished, the registered email must be notified via
                                email containing a link to validate the email. The email_validated_at
                                field should be updated at the end of this process.
                            </li>
                            <li>
                                Upon login the user is redirected to the products page. Implement the
                                product creation function.
                            </li>
                            <li>
                                Every time a product is created, the user
                                who created the product must be notified via email about the presence
                                of the new product.
                            </li>
                        </ul>
                    </div>
                    <hr>
                    <div class="my-3">
                        NAME: JEFERSON BAYKING
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function toggleInstructions() {
            let element = document.getElementById('instructions')

            if (element.style.display === "none") {
                element.style.display = "block";
            } else {
                element.style.display = "none";
            }
        }
    </script>
</body>
</html>
