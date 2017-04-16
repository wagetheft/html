<html>
    <head>
        <title>Stop Wage Theft | API Examples</title>
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
                    <h1>API Examples</h1>
                    <h2>Simple API calls</h2>
                    <div class="section">
                        <p>The API serves up data published by the Wage and Hour Division of the Department of Labor on investigations of companies. By default it returns the data in JSON. Here's the simplest API call:<br />
                            <a class="code" href="http://stopwagetheft.stanford.edu/api/v1/cases">http://stopwagetheft.stanford.edu/api/v1/cases</a>
                        </p>
                        <p>To limit the number of cases, add the limit parameter:<br>
                            <a class="code" href="http://stopwagetheft.stanford.edu/api/v1/cases?&limit=10">http://stopwagetheft.stanford.edu/api/v1/cases?&amp;limit=10</a>
                        </p>
                        <p>If the limit parameter is not specified and no other parameters are given to limit the scope to a certain time period or county, then the API by default returns only the first 100 rows. Set limit=0 to get all 200K+ rows.</p>
                        <p>To make the results easier to read, let's tell the API to return the records in HTML format since we're using the API in a browser:<br>
                            <a class="code" href="http://stopwagetheft.stanford.edu/api/v1/cases?limit=10&return_format=html">http://stopwagetheft.stanford.edu/api/v1/cases?limit=10&amp;return_format=html</a>
                        </p>
                        <p>Other available options for return_format include csv and googledatatable which is directly readable by Google Charts and Maps. Now let's limit the columns returned to the backwages, city, legal name, and state:<br>
                            <a class="code" href="http://stopwagetheft.stanford.edu/api/v1/cases?limit=10&return_format=html&columns=legal_name,city,state,backwages">http://stopwagetheft.stanford.edu/api/v1/cases?limit=10&amp;return_format=html&amp;columns=legal_name,city,state,backwages</a>
                        </p>

                        <p>If no column names are specified, then the API by default returns the most commonly used columns. To retrieve all columns use columns=all:<br>
                            <a class="code" href="http://stopwagetheft.stanford.edu/api/v1/cases?limit=10&columns=all&return_format=html&city=Santa%20Clara">http://stopwagetheft.stanford.edu/api/v1/cases?limit=10&amp;columns=all&amp;return_format=html&amp;city=Santa%20Clara</a>
                        </p>

                        <p>For a full list of all available columns, see the <a href="#availablecolumns">full list below</a>.</p>

                        <p>In the above example you can see how to limit the results to a certain city. Here you can see how to limit the results to a specific county:<br>
                            <a class="code" href="http://stopwagetheft.stanford.edu/api/v1/cases?columns=all&return_format=html&county=Alameda%20County">http://stopwagetheft.stanford.edu/api/v1/cases?columns=all&amp;return_format=html&amp;county=Alameda%20County</a>
                        </p>
                        <p>The other parameters you can use to limit the results include city, state (CA, MN, etc.), zip, industry, county_fips_code, and state_fips_code (so for example <span class="code">city=San%20Francisco</span>). You can also use a custom where clause in the format of <span class="code">&where=backwages > 20000</span>. The where statement must be SQL code.</p>

                        <p>To search by company name use the company_name search option which does a full text search on both the legal name and company name. Here's a nationwide search for cases on Cintas:<br>
                            <a class="code" href="http://stopwagetheft.stanford.edu/api/v1/cases?&return_format=html&company_name=%27Cintas%27">http://stopwagetheft.stanford.edu/api/v1/cases?&amp;return_format=html&amp;company_name=%27Cintas%27</a>
                        </p>
                        <p>You can also use sum() or avg() on a column name and the API will automatically aggregate the results, grouping by the other columns. For example, here's the API call to see total backwages and number of cases in Alameda County grouped by city and industry:<br>
                            <a class="code" href="http://stopwagetheft.stanford.edu/api/v1/cases?columns=sum(backwages),city,industry,cases_count&return_format=html&county=Alameda%20County">http://stopwagetheft.stanford.edu/api/v1/cases?columns=sum(backwages),city,industry,cases_count&amp;return_format=html&amp;county=Alameda%20County</a>
                        </p>
                        <p>cases_count is a special column that is only available when you are aggregating data. In this case as you would expect it shows the number of cases for each city and industry combination.</p>
                    </div>

                    <h2>Callback JSON function</h2>
                    <div class="section">
                        <p>Depending on how your code is written you may want to have the JSON be returned wrapped in a callback funcion. Here's how you do it:<br>
                            <a class="code" href="http://stopwagetheft.stanford.edu/api/v1/cases?columns=sum(backwages),city,industry,cases_count&county=Alameda%20County&callback=your_function">http://stopwagetheft.stanford.edu/api/v1/cases?columns=sum(backwages),city,industry,cases_count&amp;county=Alameda%20County&callback=your_function</a>
                        </p>
                    </div>

                    <h2>Dates</h2>
                    <div class="section">
                        <p>The API has support for easily limiting the results to certain time periods using the 'dates' option.</p>

                        <p>All cases with investigative periods ending in 2014:<br />
                            <a class="code" href="http://stopwagetheft.stanford.edu/api/v1/cases?dates=2014">http://stopwagetheft.stanford.edu/api/v1/cases?dates=2014</a>
                        </p>

                        <p>All cases with investigative periods ending from 2013 to 2014:<br />
                            <a class="code" href="http://stopwagetheft.stanford.edu/api/v1/cases?dates=2013,2014">http://stopwagetheft.stanford.edu/api/v1/cases?dates=2013,2014</a>
                        </p>

                        <p>All cases with investigative periods ending between December 1, 2012 and February 2, 2013:<br />
                            <a class="code" href="http://stopwagetheft.stanford.edu/api/v1/cases?dates=2012-12-01,2013-02-02">http://stopwagetheft.stanford.edu/api/v1/cases?dates=2012-12- 01,2013-02-02</a>
                        </p>
                    </div>

                    <h2>List of all available columns</h2>
                    <div class="section">
                        <table>
                            <tbody>
                                <tr><th>Default Columns:</th><th>Additional Columns:</th></tr>
                                <tr><td>case_id</td><td>county</td></tr>
                                <tr><td>trade_name</td><td>state_fips_code</td></tr>
                                <tr><td>legal_name</td><td>county_fips_code</td></tr>
                                <tr><td>street_address</td><td>combined_state_county_fips</td></tr>
                                <tr><td>city</td><td>full_naics_code</td></tr>
                                <tr><td>state</td><td>full_naics_description</td></tr>
                                <tr><td>zip</td><td>naics2</td></tr>
                                <tr><td>latitude</td><td>naics2_description</td></tr>
                                <tr><td>longitude</td><td>naics3</td></tr>
                                <tr><td>industry</td><td>naics3_description</td></tr>
                                <tr><td>backwages</td><td>naics4</td></tr>
                                <tr><td>employees_owed_backwages</td><td>naics4_description</td></tr>
                                <tr><td>civil_money_penalties</td><td>minimum_wage_and_overtime_backwages</td></tr>
                                <tr><td>findings_start_date</td><td>employees_owed_minimum_wage_and_overtime_backwages</td></tr>
                                <tr><td>findings_end_date</td><td>minimum_wage_backwages</td></tr>
                                <tr><td></td><td>overtime_backwages</td></tr>
                                <tr><td></td><td>retaliation_backwages</td></tr>
                            </tbody>
                        </table>
                    </div>

                    <h2>API call for minimum wage violations by industry for CA</h2>
                    <div class="section">
                        <p><a class="code" href="http://stopwagetheft.stanford.edu/api/v1/cases?columns=industry,sum(minimum_wage_backwages)&order=minimum_wage_backwages%20desc&where=state=%27CA%27&return_format=googledatatable">http://stopwagetheft.stanford.edu/api/v1/cases?columns=industry,sum(minimum_wage_backwages)&amp;order=minimum_wage_backwages%20desc&amp;where=state=%27CA%27&amp;return_format=googledatatable</a></p><p>Here the API call adds up all the minimum wage backwages by industry, orders the results in descending order by the backwages, limits the results only to California, and returns the results in the "googledatatable" format which can be immediately read by Google Maps and Charts API. After clicking on the link try changing return_format=googledatatable to return_format=html for easier reading in a browser.</p>
                    </div>

                </div>
            </section>
        </div>
        <?php include '../includes/footer.php'; ?>
    </body>
</html>
