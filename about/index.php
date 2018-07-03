<html>
    <head>
        <title>Stop Wage Theft | About</title>
        <?php include '../includes/head_meta.php'; ?>
    </head>
    <body class="home">
        <div id="wrapper">
            <header id="header">
                <h2 id="title"><a href="/">Stop Wage Theft</a></h2>
                <?php include '../includes/navigation.php'; ?>
            </header>
            <section id="content">
                <div class="content-section">
                    <h1>About</h1>

                    <p>Historically the theft of wages has been a business and policy problem and not an engineering problem. That is no longer the case. A group of volunteers have accepted the challenge to create a predictive model for where wage theft is currently undetected and then visualize that data.</p>
                    <blockquote class="three right">Our goal is to find gaps in the dataset where violators are flying under the radar.</blockquote>
                    <p>The Stanford University Center for Integrated Facility Engineering hosts this project, which is appropriate since the construction industry is one of the leading sources of wage theft.</p>
                    <p>In the ongoing fight against wage theft, Stanford CIFE has joined with the Santa Clara County Wage Theft Coalition. The coalition is a collection of community organizations in Santa Clara County (aka Silicon Valley) with a mission to stop wage theft. Currently wage theft is slowed by a mix of government and non-profit organizations such as the Department of Labor Wage and Hour Division, which enforces the Fair Labor Standards Act (FLSA) for minimum wage and overtime pay standards.</p>
                    <p>Our goal is to stop the predatory exploitation of vulnerable populations. These include: paying less than minimum wage, failing to pay overtime, forcing work off the clock, issuing paychecks that bounce, stealing tips, denying required meal and rest breaks, misclassifying work (i.e., as independent contract work), and not paying at all.</p>
                    <p>Even when a worker exercises their right, they face illegal retaliation. Even with a court award, it is hard to collect; on average, workers collect 20 cents on the dollar.</p>
                    <p>The Wage Theft Coalition needs to show public policy makers that wage theft is a problem in their jurisdiction and that they must pass ordinances to end exploitation.</p>
                    <p>Wage theft is a classic missing species problem: Predictions using existing data predict known violators. The known violators form a demographic, however, there are undiscovered demographics of violators. For example, what agricultural crops have the highest complaints?</p>

                    <h2>Questions</h2>
                    <ul>
                        <li>What features predict populations vulnerable to wage theft?</li>
                        <li>To what degree can these features estimate to what degree wage theft impacts a population?</li>
                        <li>To what degree do visualizations of impact estimates allow advocates to A) draw conclusions and B) host discussions?</li>
                    </ul>

                    <h2>Datasets</h2>
                    <ul>
                        <li>Investigation and complaint source cases; organized by NAICS and case unique ID. Each case is an event of a single company, multiple employees, and multiple violations.</li>
                        <li>Source of case (not available to public)</li>
                        <li>Industry demographics such as OSHA, MSHA, Census, Dept of Commerce, ACS</li>
                        <li>State, region, and city, such as the California Labor Commission, the County of Santa Clara, and the City of San Jose</li>
                        <li>Advocate groups such as Building Trades Council (BTC) and the Foundation for Fair Contracting (FFC),</li>
                    </ul>

                    <h2>Successes</h2>
                    <ul>
                        <li>Data visualizations</li>
                        <li>Integration of datasets from various sources (next step is automate with API)</li>
                        <li>Supported ordinance development</li>
                        <ul>
                            <li>Santa Clara County</li>
                            <li>City of Milpitas</li>
                            <li>City of Cupertino</li>
                            <li>City of Sunnyvale</li>
                            <li>City of Mountain View</li>
                        </ul>
                        <li>Developed apps</li>
                        <ul>
                            <li>‘Eat, Shop, Sleep’ of violators</li>
                            <li>Roofers wage theft app</li>
                            <li>WorkerReport for complaints</li>
                            <li>HourVoice to record work hours</li>
                            </ul>
                        <li>A DataKind DataDive for social good. Volunteer data scientists came together from around the bay area for a weekend ‘hackathon.’ We developed predictive models and visualizations of wage theft. We intended for these to provide content for our site and other sites.</li>
                    </ul>
                </div>
            </section>
        </div>
        <?php include '../includes/footer.php'; ?>
    </body>
</html>
