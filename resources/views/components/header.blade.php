<div class="header">
    <form action="/" class="header__searchbar">
        <div class="icon">
            <i class='bx bx-search'></i>
        </div>
        <input type="search" name="search" id="serach" placeholder="Search" value="{{ ($searchValue) ? $searchValue : '' }}">
    </form>
    @if ($searchValue)
    <a href="/" class="btn" style="margin-left: 1rem">Clear search</a>
    @endif
    <div class="header__dropdown">
        <div class="image-icon">
            <img src="https://cdn.kibrispdr.org/data/gambar-icon-user-0.jpg" alt="">
        </div>
        <div class="username">Muiz Ahsanu</div>
        <i class='bx bxs-down-arrow' ></i>
    </div>
</div>