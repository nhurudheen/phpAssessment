<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | Faniyi Nurudeen Assessment</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Outfit:wght@100..900&display=swap"
        rel="stylesheet">
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <style type="text/tailwindcss">
        @theme {
            --color-primary: #222831;
            --color-lightPrimary: #31363F;
            --color-secondary: #1DA1F2;
        }

        .font-montserrat {
            @apply font-[Montserrat];
        }

        .font-outfit {
            @apply font-[Outfit];
        }
    </style>

</head>

<body class="font-outfit">
    <div id="toast-container" class="fixed top-5 right-5 space-y-2 z-50"></div>
    <div class="min-h-screen bg-primary">
        <div class="h-[80px] border-b border-b-[#c4c4c416] bg-primary shadow-lg flex items-center px-4 md:px-10">
            <span class="text-xl lg:text-2xl font-semibold text-white">
                PHP Developer Assessment Task
            </span>
        </div>

        <div class="text-white">
            @yield('pageContent')
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            @if (session('success'))
                showToast("{{ session('success') }}", "success");
            @endif
            @if (session('error'))
                showToast("{{ session('error') }}", "error");
            @endif
        });

        function showToast(message, type = "success") {
            const toastContainer = document.getElementById("toast-container");
            const toast = document.createElement("div");

            toast.className = `flex items-center gap-3 p-4 shadow-md text-white text-sm  ${
              type === "success" ? "bg-green-500" : "bg-red-500"
          }`;

            toast.innerHTML = `
              <span class="text-lg">
                  ${type === "success"
                      ? '<svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>'
                      : '<svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>'
                  }
              </span>
              <span>${message}</span>
          `;

            toastContainer.appendChild(toast);

            setTimeout(() => {
                toast.classList.add("opacity-0", "transition-opacity", "duration-500");
                setTimeout(() => toast.remove(), 500);
            }, 3000);
        }
    </script>
</body>

</html>
