
<!-- Sidebar  -->
<div class="iq-sidebar">
    <div class="iq-menu-bt-sidebar d-flex justify-content-end">
        <div class="iq-menu-bt align-self-center">
            <div class="wrapper-menu">
                <div class="main-circle">
                    <svg width="29" height="29" viewBox="0 0 29 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M14.5 14.5L21.25 7.75M21.25 7.75H16.1875M21.25 7.75V12.8125" stroke="#FFFFFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M14.5 14.5L7.74997 21.25M7.74997 21.25H12.8125M7.74997 21.25V16.1875" stroke="#FFFFFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M28 14.5C28 20.8639 28 24.046 26.0229 26.0229C24.046 28 20.8639 28 14.5 28C8.13603 28 4.95406 28 2.97703 26.0229C1 24.046 1 20.8639 1 14.5C1 8.13603 1 4.95406 2.97703 2.97703C4.95406 1 8.13603 1 14.5 1C20.8639 1 24.046 1 26.0229 2.97703C27.3376 4.29158 27.7781 6.13884 27.9256 9.1" stroke="#FFFFFF" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                </div>
                <div class="hover-circle">
                    <svg width="27" height="27" viewBox="0 0 27 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M23.5002 3.50001L16.0002 11M16.0002 11H20.6877M16.0002 11V6.31251" stroke="#FFFFFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M3.50018 23.5L11.0002 16M11.0002 16H6.31268M11.0002 16V20.6875" stroke="#FFFFFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M26 13.5C26 19.3925 26 22.3389 24.1694 24.1694C22.3389 26 19.3925 26 13.5 26C7.60744 26 4.66116 26 2.83059 24.1694C1 22.3389 1 19.3925 1 13.5C1 7.60744 1 4.66116 2.83059 2.83059C4.66116 1 7.60744 1 13.5 1C19.3925 1 22.3389 1 24.1694 2.83059C25.3866 4.04776 25.7945 5.75819 25.9311 8.5" stroke="#FFFFFF" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                    
                </div>
            </div>
        </div>
    </div>
    <div class="iq-sidebar-logo d-flex justify-content-between align-items-center">
        <a href="<?= BASE_URL?>referral/dashboard" class="header-logo">
            <div class="logo-title d-flex align-items-center">
                <img src="<?= BASE_URL?>assets/img/logo-satoshi.png" class="logo-sidebar-admin" alt="logo pnglobal">
                <span class="text-white text-uppercase">SATOSHI SIGNAL</span>
            </div>
        </a>
    </div>
    <div id="sidebar-scrollbar">
        <nav class="iq-sidebar-menu">
            <ul id="iq-sidebar-toggle" class="iq-menu">
                <li class="<?= @$active_dash?>">
                    <a href="<?=BASE_URL?>referral/dashboard" class="iq-waves-effect">
                        <i>
                            <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7.04505 9.20507C9.51607 6.73405 10.7516 5.49854 12.1299 4.92763C13.9676 4.16642 16.0324 4.16642 17.8701 4.92763C19.2484 5.49854 20.4839 6.73405 22.955 9.20507V9.20507C24.0354 10.2855 24.5756 10.8257 24.986 11.4399C25.5332 12.2589 25.9137 13.1776 26.1059 14.1436C26.25 14.868 26.25 15.632 26.25 17.16V22.5001C26.25 24.5712 24.5711 26.2501 22.5 26.2501V26.2501C20.4289 26.2501 18.75 24.5712 18.75 22.5001V21.2501C18.75 19.1791 17.0711 17.5001 15 17.5001V17.5001C12.9289 17.5001 11.25 19.1791 11.25 21.2501V22.5001C11.25 24.5712 9.57107 26.2501 7.5 26.2501V26.2501C5.42893 26.2501 3.75 24.5712 3.75 22.5001V17.16C3.75 15.632 3.75 14.868 3.89411 14.1436C4.08626 13.1776 4.46679 12.2589 5.01398 11.4399C5.42437 10.8257 5.9646 10.2855 7.04505 9.20507V9.20507Z" fill="<?= (@$active_dash != null) ? 'black' : 'white' ?>"/>
                            </svg>
                        </i>
                        <span class="<?= (@$active_dash != null) ? 'text-black' : 'text-white' ?>">Dashboard</span>
                    </a>
                </li>
                <li class="<?= @$active_reff?>">
                    <a href="<?=BASE_URL?>referral/referral" class="iq-waves-effect">
                        <i>
                            <svg width="30" height="24" viewBox="0 0 30 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M15 10.525C17.4611 10.525 19.4563 8.52992 19.4563 6.0688C19.4563 3.60768 17.4611 1.61255 15 1.61255C12.5389 1.61255 10.5438 3.60768 10.5438 6.0688C10.5438 8.52992 12.5389 10.525 15 10.525Z" fill="<?= (@$active_reff != null) ? 'black' : 'white' ?>"/>
                                <path d="M20.6625 11.9062L19.6125 11.5938L15 16.2125L10.3875 11.5938L9.33742 11.9062C6.61866 12.725 4.79364 15.175 4.79364 18.0125V23.25H25.2061V18.0125C25.2063 15.175 23.3813 12.725 20.6625 11.9062Z" fill="<?= (@$active_reff != null) ? 'black' : 'white' ?>"/>
                                <path d="M20.2688 0.75C19.5134 0.75 18.7894 0.953633 18.1539 1.31735C19.6906 2.34091 20.7062 4.08779 20.7062 6.06852C20.7062 7.24258 20.3491 8.33444 19.7389 9.2426C19.9142 9.26469 20.0907 9.28126 20.2688 9.28126C22.625 9.28126 24.5375 7.36877 24.5375 5.01252C24.5375 2.66242 22.625 0.75 20.2688 0.75Z" fill="<?= (@$active_reff != null) ? 'black' : 'white' ?>"/>
                                <path d="M25.6625 10.5313L24.6438 10.2313L23.1486 11.7265C25.1884 13.1177 26.4563 15.4318 26.4563 18.0125V21.375H30V16.3625C30 13.6563 28.2563 11.3125 25.6625 10.5313Z" fill="<?= (@$active_reff != null) ? 'black' : 'white' ?>"/>
                                <path d="M11.8461 1.31735C11.2106 0.953633 10.4866 0.75 9.73126 0.75C7.37501 0.75 5.46252 2.66242 5.46252 5.01252C5.46252 7.36877 7.37501 9.28126 9.73126 9.28126C9.90931 9.28126 10.0858 9.26463 10.2611 9.2426C9.65084 8.3345 9.29378 7.24258 9.29378 6.06852C9.29378 4.08779 10.3093 2.34091 11.8461 1.31735Z" fill="<?= (@$active_reff != null) ? 'black' : 'white' ?>"/>
                                <path d="M5.35628 10.2313L4.34377 10.5313H4.33748C1.74377 11.3125 0 13.6563 0 16.3625V21.375H3.54371V18.0125C3.54371 15.4312 4.81223 13.1167 6.85109 11.7261L5.35628 10.2313Z" fill="<?= (@$active_reff != null) ? 'black' : 'white' ?>"/>
                            </svg>
                        </i>
                        <span class="<?= (@$active_reff != null) ? 'text-black' : 'text-white' ?>">Referral</span>
                    </a>
                </li>
                <li class="<?=@$active_wd?>">
                    <a href="<?= BASE_URL ?>referral/referral/withdraw" class="iq-waves-effect">
                        <i>
                            <svg width="30" height="30" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#ffffff" d="M312 24l0 10.5c6.4 1.2 12.6 2.7 18.2 4.2c12.8 3.4 20.4 16.6 17 29.4s-16.6 20.4-29.4 17c-10.9-2.9-21.1-4.9-30.2-5c-7.3-.1-14.7 1.7-19.4 4.4c-2.1 1.3-3.1 2.4-3.5 3c-.3 .5-.7 1.2-.7 2.8c0 .3 0 .5 0 .6c.2 .2 .9 1.2 3.3 2.6c5.8 3.5 14.4 6.2 27.4 10.1l.9 .3s0 0 0 0c11.1 3.3 25.9 7.8 37.9 15.3c13.7 8.6 26.1 22.9 26.4 44.9c.3 22.5-11.4 38.9-26.7 48.5c-6.7 4.1-13.9 7-21.3 8.8l0 10.6c0 13.3-10.7 24-24 24s-24-10.7-24-24l0-11.4c-9.5-2.3-18.2-5.3-25.6-7.8c-2.1-.7-4.1-1.4-6-2c-12.6-4.2-19.4-17.8-15.2-30.4s17.8-19.4 30.4-15.2c2.6 .9 5 1.7 7.3 2.5c13.6 4.6 23.4 7.9 33.9 8.3c8 .3 15.1-1.6 19.2-4.1c1.9-1.2 2.8-2.2 3.2-2.9c.4-.6 .9-1.8 .8-4.1l0-.2c0-1 0-2.1-4-4.6c-5.7-3.6-14.3-6.4-27.1-10.3l-1.9-.6c-10.8-3.2-25-7.5-36.4-14.4c-13.5-8.1-26.5-22-26.6-44.1c-.1-22.9 12.9-38.6 27.7-47.4c6.4-3.8 13.3-6.4 20.2-8.2L264 24c0-13.3 10.7-24 24-24s24 10.7 24 24zM568.2 336.3c13.1 17.8 9.3 42.8-8.5 55.9L433.1 485.5c-23.4 17.2-51.6 26.5-80.7 26.5L192 512 32 512c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l36.8 0 44.9-36c22.7-18.2 50.9-28 80-28l78.3 0 16 0 64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0-16 0c-8.8 0-16 7.2-16 16s7.2 16 16 16l120.6 0 119.7-88.2c17.8-13.1 42.8-9.3 55.9 8.5zM193.6 384c0 0 0 0 0 0l-.9 0c.3 0 .6 0 .9 0z"/></svg>
                        </i>
                        <span>Withdraw</span>
                    </a>
                </li>
                <li class="<?=@$active_give?>">
                    <a href="<?= BASE_URL ?>referral/referral/giveaway" class="iq-waves-effect">
                        <i>
                            <svg width="30" height="30" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#ffffff" d="M190.5 68.8L225.3 128l-1.3 0-72 0c-22.1 0-40-17.9-40-40s17.9-40 40-40l2.2 0c14.9 0 28.8 7.9 36.3 20.8zM64 88c0 14.4 3.5 28 9.6 40L32 128c-17.7 0-32 14.3-32 32l0 64c0 17.7 14.3 32 32 32l448 0c17.7 0 32-14.3 32-32l0-64c0-17.7-14.3-32-32-32l-41.6 0c6.1-12 9.6-25.6 9.6-40c0-48.6-39.4-88-88-88l-2.2 0c-31.9 0-61.5 16.9-77.7 44.4L256 85.5l-24.1-41C215.7 16.9 186.1 0 154.2 0L152 0C103.4 0 64 39.4 64 88zm336 0c0 22.1-17.9 40-40 40l-72 0-1.3 0 34.8-59.2C329.1 55.9 342.9 48 357.8 48l2.2 0c22.1 0 40 17.9 40 40zM32 288l0 176c0 26.5 21.5 48 48 48l144 0 0-224L32 288zM288 512l144 0c26.5 0 48-21.5 48-48l0-176-192 0 0 224z"/></svg>
                        </i>
                        <span>Giveaway</span>
                    </a>
                </li>
                <li>
                    <a href="<?= BASE_URL ?>referral/auth/logout" class="iq-waves-effect">
                        <i>
                            <svg width="36" height="37" viewBox="0 0 36 37" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M18 18.561H31.5M31.5 18.561L27.75 14.811M31.5 18.561L27.75 22.311M22.5 13.311V13.161C22.5 9.78628 22.5 8.0989 21.6406 6.916C21.363 6.53398 21.0271 6.19802 20.645 5.92046C19.4621 5.06104 17.7748 5.06104 14.4 5.06104H12.6C9.22524 5.06104 7.53786 5.06104 6.35497 5.92046C5.97294 6.19802 5.63698 6.53398 5.35942 6.916C4.5 8.0989 4.5 9.78628 4.5 13.161V23.961C4.5 27.3358 4.5 29.0232 5.35942 30.2061C5.63698 30.5881 5.97294 30.9241 6.35497 31.2016C7.53786 32.061 9.22524 32.061 12.6 32.061H14.4C17.7748 32.061 19.4621 32.061 20.645 31.2016C21.0271 30.9241 21.363 30.5881 21.6406 30.2061C22.5 29.0232 22.5 27.3358 22.5 23.961V23.811" stroke="white" stroke-width="2.25" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </i>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>
<!-- TOP Nav Bar -->
<div class="iq-top-navbar d-block d-lg-none">
    <div class="iq-navbar-custom">
        <nav class="navbar navbar-expand-lg navbar-light p-0">
            <div class="iq-menu-bt d-flex align-items-center">
                <div class="wrapper-menu">
                    <div class="main-circle"><i class="ri-arrow-left-s-line"></i></div>
                    <div class="hover-circle"><i class="ri-arrow-right-s-line"></i></div>
                </div>
                <div class="iq-navbar-logo d-flex justify-content-between">
                    <a href="<?=BASE_URL?>referral/dashboard" class="header-logo">
                        <div class="logo-title d-flex align-items-center">
                            <img src="<?= BASE_URL?>assets/img/logo.png" class="logo-sidebar-admin" alt="logo pnglobal">
                            <span class="text-white text-uppercase">SATOSHI SIGNAL</span>
                        </div>
                    </a>
                </div>
            </div>
        </nav>
    </div>
</div>
<!-- TOP Nav Bar END -->