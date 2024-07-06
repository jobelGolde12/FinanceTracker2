<template>
<div>
    <section id="home">
        <header class="header d-flex flex-row justify-content-between">
            <div class="header-left">
                <div class="logo">
                    <h5 class="text-warning">Finance tracker</h5>
                </div>
            </div>

            <div class="header-right flex-row align-items-center justify-content-center gap-4 me-3">
                <div>
                    <a href="#features" class="link link1 text-decoration-none fw-bold">Features</a>
                </div>

                <div>
                    <a href="#" class="link link1 text-decoration-none fw-bold">Pricing</a>
                </div>

                <div>
                    <a href="#" class="link link1 text-decoration-none fw-bold">About us</a>
                </div>

                <div>
                    <router-link to="/login" class="btn btn-outline-warning">Login</router-link>
                </div>
                <div>
                    <router-link to="/signup" class="btn btn-warning text-dark link link3">Signup</router-link>
                </div>
            </div>

            <div class="hamburger">
                <i class="bi bi-list fs-2 pointer me-3" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample"></i>
            </div>
        </header>

        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title gray" id="offcanvasExampleLabel">
                    Finance Tracker
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body d-flex flex-column gap-3">
                <div class="">
                    <a href="#features" class="link link1 text-decoration-none fw-normal hover">Features</a>
                </div>

                <div class="">
                    <router-link to="/login" class="link link2 text-decoration-none fw-normal hover">Login</router-link>
                </div>

                <div class="">
                    <router-link to="/signup" class="btn btn-warning link link3">Signup</router-link>
                </div>
            </div>
        </div>

        <div class="container hero-container mt-5 text-center pt-5">
            <h1 class="text-light">
                WELCOME TO PERSONAL <br />
                FINANCE TRACKER
            </h1>
            <p class="text-light">Take control of your finance with ease</p>
            <router-link to="/login" class="btn btn-warning"><i class="bi bi-arrow-right text-dark"></i> Get started</router-link>
        </div>

        <div class="container p-3 hero-footer d-flex flex-row align-items-center gap-2">
            <div>
                <i class="bi bi-globe text-light fs-4"></i>
            </div>
            <div>
                <p class="text-light fw-lighter mt-3">
                    Trusted of over <span class="text-warning">3,000</span> people
                    worldwide
                </p>
            </div>
        </div>

        <!-- End of #home  -->
    </section>

    <section id="introduction" class="bg-light">
        <div class="container text-center mt-4">
            <h3 class="text-dark">Why Choose Us?</h3>
        </div>

        <div class="container-fluid introduction-top d-flex flex-rowjustify-content-between align-items-center mt-5">
            <div class="container">
                <h5 class="fw-normal gray">Effortless Budgeting</h5>
                <p class="text-dark">
                    Take control of your finances with our simple-to-use tracker. Know
                    exactly where your money goes and make informed spending decisions.
                </p>
            </div>

            <div class="container">
                <h5 class="fw-normal gray">Financial Freedom Starts Here</h5>
                <p class="text-dark">
                    Our platform empowers you to manage your money effectively. Reach
                    your financial goals faster with clear budgeting tools and
                    insightful visualizations.
                </p>
            </div>
        </div>

        <div class="container introduction-bottom mt-5 pt-5 text-center d-flex justify-content-center">
            <div class="introduction-bottom-header">
                <h5 class="gray fw-normal bg-light">Smarter Spending</h5>
            </div>
        </div>
        <div class="container text-center pt-4">
            <p class="text-dark">
                Gain valuable insights into your spending habits. Set realistic goals
                and optimize your budget for a healthier financial future
            </p>
        </div>
    </section>

    <section id="features" class="bg-light pt-4 pb-3">
        <div class="cotainer text-center">
            <h3>Features</h3>
        </div>
        <div class="container-fluid card-container d-flex flex-row justify-content-around align-items-center">
            <div class="card" style="width: 18rem">
                <i class="bi bi-wallet2 text-dark text-center"></i>
                <div class="card-body">
                    <h5 class="card-title text-center gray">Financial goals</h5>
                    <p class="card-text">Set and achieve your financial targets.</p>
                </div>
            </div>

            <div class="card" style="width: 18rem">
                <i class="bi bi-graph-up-arrow text-dark text-center"></i>
                <div class="card-body">
                    <h5 class="card-title text-center gray">Budget management</h5>
                    <p class="card-text">Create and stick to your budget.</p>
                </div>
            </div>

            <div class="card" style="width: 18rem">
                <i class="bi bi-bullseye text-dark text-center"></i>
                <div class="card-body">
                    <h5 class="card-title text-center gray">Expense tracking</h5>
                    <p class="card-text">Keep an eye on your spending.</p>
                </div>
            </div>
        </div>

        <div class="container mt-5">
            <p class="text-muted">
                 Our Personal Finance Tracker is designed to
                empower you with comprehensive tools to manage your finances
                effectively. With our intuitive budget management feature, you can
                create and maintain a budget tailored to your needs, ensuring you
                allocate funds appropriately and avoid overspending. The expense
                tracking functionality allows you to monitor your spending habits
                seamlessly, providing a clear picture of where your money is going.
                Our platform also helps you set and achieve financial goals, whether
                it's saving for a dream vacation, paying off debt, or building an
                emergency fund.
            </p>
        </div>

        <div class="container mt-3">
            <router-link to="/login" class="btn btn-warning"><i class="bi bi-arrow-right text-dark"></i> Get started</router-link>
        </div>
    </section>

    <section id="footer" class="bg-dark flex-row justify-content-between pt-2">
        <div class="container p-4">
            <h4 class="text-light fw-light mb-0 pb-0">Personal Finance Tracker</h4>
            <p class="text-light fw-light">
                Take control of your finance with ease
            </p>
        </div>

        <div class="container d-flex flex-column gap-2 p-4">
            <h4 class="text-light fw-light mb-0 pb-0">Get in touch</h4>
            <a href="#" class="text-fff hover">About Us!</a>
            <a href="#features" class="text-fff hover">Features</a>
            <a href="#" class="text-fff hover">Pricing</a>
            <router-link to="/login" class="text-fff hover">Login</router-link>
            <router-link to="/signup" class="text-fff hover">Signup</router-link>
        </div>

        <div class="container p-4">
            <h4 class="text-light fw-light">Follow Us!</h4>
            <p class="text-fff hover">
                <i class="bi bi-facebook me-2"></i>Facebook
            </p>
            <p class="text-fff hover"><i class="bi bi-twitter me-2"></i>Twitter</p>
            <p class="text-fff hover">
                <i class="bi bi-instagram me-2"></i>Instagram
            </p>
        </div>
    </section>
</div>
</template>

<script>
export default {
    name: "Welcomecomponent",
};
</script>

<style>
@import "../../../css/welcome/welcome.css";
</style>
