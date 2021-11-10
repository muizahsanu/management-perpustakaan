<div class="sidenav">
    <div class="sidenav__brand">
        <div class="dummy-brand">
            <i class='bx bxs-parking ic-1'></i>
            <i class='bx bxs-parking ic-2'></i>
        </div>
        <span>Perpustakaan</span>
    </div>
    <a href="/" class="sidenav__item {{ ($title == 'Book') ? 'active' : '' }}">
        <i class='bx bxs-book' ></i>
        <span>Books</span>
        <a href="/book/add-book" class="sidenav__item--child {{ ($title == 'Add Book') ? 'active' : '' }}">
            <i class="bx bx-plus"></i>
            <span>Add Book</span>
        </a>
    </a>
    <a href="/category" class="sidenav__item {{ ($title == 'Categories') ? 'active' : '' }}">
        <i class='bx bxs-category'></i>
        <span>Categories</span>
        <a href="/category/add" class="sidenav__item--child {{ ($title == 'Add Category') ? 'active' : '' }}">
            <i class="bx bx-plus"></i>
            <span>Add Category</span>
        </a>
    </a>
</div>