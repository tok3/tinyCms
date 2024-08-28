<!--:Dark Mode:-->
<div class="d-inline-flex width-13x align-items-center dropup mt-6">
    <button class="btn border text-body py-2 px-2 d-flex align-items-center"
        id="assan-theme" type="button" aria-expanded="false" data-bs-toggle="dropdown"
        data-bs-display="static">
        <span class="theme-icon-active d-flex align-items-center">
            <i class="bx align-middle"></i>
        </span>
    </button>
    <!--:Dark Mode Options:-->
    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="assan-theme" style="--bs-dropdown-min-width: 9rem;">
        <li class="mb-1">
            <button type="button" class="dropdown-item d-flex align-items-center active"
                data-bs-theme-value="light">
                <span class="theme-icon d-flex align-items-center">
                    <i class="bx bx-sun align-middle me-2"> </i>
                </span>
                Light
            </button>
        </li>
        <li class="mb-1">
            <button type="button" class="dropdown-item d-flex align-items-center"
                data-bs-theme-value="dark">
                <span class="theme-icon d-flex align-items-center">
                    <i class="bx bx-moon align-middle me-2"></i>
                </span>
                Dark
            </button>
        </li>
        <li>
            <button type="button" class="dropdown-item d-flex align-items-center"
                data-bs-theme-value="auto">
                <span class="theme-icon d-flex align-items-center">
                    <i class="bx bx-color-fill align-middle me-2"></i>
                </span>
                Auto
            </button>
        </li>
    </ul>
</div>