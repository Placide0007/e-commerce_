<footer class="px-5 sm:px-8 md:px-12 lg:px-20 xl:px-25 bg-slate-950 text-white border border-slate-100">

    <div class="grid py-5 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 lg:gap-10">

        <div class="flex flex-col gap-2 py-3">

            <p class="underline py-3">
                E_Commerce
            </p>

            <p class="max-w-80 text-slate-400 text-xs leading-10">
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Unde corrupti dolor neque cupiditate eius possimus? Totam, placeat. Quaerat, ullam laborum.
            </p>

        </div>

        <div class="flex flex-col gap-2 py-3">

            <p class="underline py-3">
                Navigation
            </p>

            <a class="text-slate-400 text-xs hover:text-white transition" href="{% url 'home' %}">
                Accueil
            </a>

            @auth
                <a class="text-slate-400 text-xs hover:text-white transition" href="{% url 'profile' %}">
                    Mon compte
                </a>
            @endauth

        </div>

        <div class="flex flex-col gap-2 py-3">

            <p class="underline py-3">
                E_commerce
            </p>

            <p class="text-slate-400 text-xs">
                Madagascar
            </p>

            <p class="text-slate-400 text-xs">
                Toamasina, Madagascar
            </p>

            <p class="text-slate-400 text-xs">
                Espace pour achat
            </p>

        </div>

    </div>

    <div class="flex flex-col sm:flex-row text-slate-400 justify-between gap-2 py-4 text-xs border-slate-700 border-t">

        <p>
            &copy; 2026 E_Commerce 
        </p>

        <p>
            E_Commerce
        </p>

    </div>

</footer>