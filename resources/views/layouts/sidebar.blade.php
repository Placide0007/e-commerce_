@vite(['resources/css/sidebar.css'])
<aside>
    <ul>
        <li>
            <a href="{{ route('users.index') }}">Utilisateurs</a>
        </li>
        <li>
            <a href="{{ route('categories.index') }}">Categories</a>
        </li>
        <li>
            <a href="{{ route('products.index') }}">Produits</a>
        </li>
    </ul>
</aside>