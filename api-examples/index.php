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
                    <p>The API serves up data published by the Wage and Hour Division of the Department of Labor on investigations of companies. By default it returns the data in JSON. Here's the simplest API call:
                    <a href="http://stopwagetheft.stanford.edu/api/v1/cases">http://stopwagetheft.stanford.edu/api/v1/cases</a></p>
                    <p>To limit the number of cases, add the limit parameter:<br>
                        <a href="http://stopwagetheft.stanford.edu/api/v1/cases?&limit=10">http://stopwagetheft.stanford.edu/api/v1/cases?&amp;limit=10</a>
                    </p>
                    <p>If the limit parameter is not specified and no other parameters are given to limit the scope to a certain time period or county, then the API by default returns only the first 100 rows. Set limit=0 to get all 200K+ rows.</p>
                    <p>To make the results easier to read, let's tell the API to return the records in HTML format since we're using the API in a browser:<br><a href="http://stopwagetheft.stanford.edu/api/v1/cases?limit=10&return_format=html">http://stopwagetheft.stanford.edu/api/v1/cases?limit=10&amp;return_format=html</a></p>
                    <p>Other available options for return_format include csv and googledatatable which is directly readable by Google Charts and Maps. Now let's limit the columns returned to the backwages, city, legal name, and state:<br><a href="http://stopwagetheft.stanford.edu/api/v1/cases?limit=10&return_format=html&columns=legal_name,city,state,backwages">http://stopwagetheft.stanford.edu/api/v1/cases?limit=10&amp;return_format=html&amp;columns=legal_name,city,state,backwages</a></p>

                    <p>If no column names are specified, then the API by default returns the most commonly used columns. To retrieve all columns use columns=all:<br><a href="http://stopwagetheft.stanford.edu/api/v1/cases?limit=10&columns=all&return_format=html&city=Santa%20Clara">http://stopwagetheft.stanford.edu/api/v1/cases?limit=10&amp;columns=all&amp;return_format=html&amp;city=Santa%20Clara</a></p>

                    <p>For a full list of all available columns, see the <a href="#availablecolumns">full list below</a>.</p>

                    <p>In the above example you can see how to limit the results to a certain city. Here you can see how to limit the results to a specific county:<br><a href="http://stopwagetheft.stanford.edu/api/v1/cases?columns=all&return_format=html&county=Alameda%20County">http://stopwagetheft.stanford.edu/api/v1/cases?columns=all&amp;return_format=html&amp;county=Alameda%20County</a></p>
                    <p>The other parameters you can use to limit the results include city, state (CA, MN, etc.), zip, industry, county_fips_code, and state_fips_code (so for example city=San%20Francisco). You can also use a custom where clause in the format of "&where=backwages > 20000". The where statement must be SQL code.</p>

                    <p>To search by company name use the company_name search option which does a full text search on both the legal name and company name. Here's a nationwide search for cases on Cintas:<br><a href="http://stopwagetheft.stanford.edu/api/v1/cases?&return_format=html&company_name=%27Cintas%27">http://stopwagetheft.stanford.edu/api/v1/cases?&amp;return_format=html&amp;company_name=%27Cintas%27</a></p>
                    <p>You can also use sum() or avg() on a column name and the API will automatically aggregate the results, grouping by the other columns. For example, here's the API call to see total backwages and number of cases in Alameda County grouped by city and industry:<br>
                        <a href="http://stopwagetheft.stanford.edu/api/v1/cases?columns=sum(backwages),city,industry,cases_count&return_format=html&county=Alameda%20County">http://stopwagetheft.stanford.edu/api/v1/cases?columns=sum(backwages),city,industry,cases_count&amp;return_format=html&amp;county=Alameda%20County</a>
                    </p>
                    <p>cases_count is a special column that is only available when you are aggregating data. In this case as you would expect it shows the number of cases for each city and industry combination.</p>

                    <h2>Callback JSON function</h2>
                    <p>Depending on how your code is written you may want to have the JSON be returned wrapped in a callback funcion. Here's how you do it:<br>
                        <a href="http://stopwagetheft.stanford.edu/api/v1/cases?columns=sum(backwages),city,industry,cases_count&county=Alameda%20County&callback=your_function">http://stopwagetheft.stanford.edu/api/v1/cases?columns=sum(backwages),city,industry,cases_count&amp;county=Alameda%20County&callback=your_function</a>
                    </p>

                    <h2>Dates</h2>
                    <p>The API has support for easily limiting the results to certain time periods using the 'dates' option.</p>

                    <p>All cases with investigative periods ending in 2014: <a href="http://stopwagetheft.stanford.edu/api/v1/cases?dates=2014">http://stopwagetheft.stanford.edu/api/v1/cases?dates=2014</a></p>

                    <p>All cases with investigative periods ending from 2013 to 2014: <a href="http://stopwagetheft.stanford.edu/api/v1/cases?dates=2013,2014">http://stopwagetheft.stanford.edu/api/v1/cases?dates=2013,2014</a></p>

                    <p>All cases with investigative periods ending between December 1, 2012 and February 2, 2013:<a href="http://stopwagetheft.stanford.edu/api/v1/cases?dates=2012-12-01,2013-02-02">http://stopwagetheft.stanford.edu/api/v1/cases?dates=2012-12- 01,2013-02-02</a></p>

                    <h2>List of all available columns</h2>
                    <p>Columns returned by default: case_id, trade_name, legal_name, street_address, city, state, zip, latitude, longitude, industry, backwages, employees_owed_backwages, civil_money_penalties, findings_start_date, findings_end_date</p>

                    <p>Additional columns: county, state_fips_code, county_fips_code, combined_state_county_fips, full_naics_code, full_naics_description, naics2, naics2_description, naics3, naics3_description, naics4, naics4_description,  minimum_wage_and_overtime_backwages, employees_owed_minimum_wage_and_overtime_backwages, minimum_wage_backwages, overtime_backwages, retaliation_backwages</p>

                    <h2>API call for minimum wage violations by industry for CA</h2>
                    <p><a href="http://stopwagetheft.stanford.edu/api/v1/cases?columns=industry,sum(minimum_wage_backwages)&order=minimum_wage_backwages%20desc&where=state=%27CA%27&return_format=googledatatable">http://stopwagetheft.stanford.edu/api/v1/cases?columns=industry,sum(minimum_wage_backwages)&amp;order=minimum_wage_backwages%20desc&amp;where=state=%27CA%27&amp;return_format=googledatatable</a></p><p>Here the API call adds up all the minimum wage backwages by industry, orders the results in descending order by the backwages, limits the results only to California, and returns the results in the "googledatatable" format which can be immediately read by Google Maps and Charts API. After clicking on the link try changing return_format=googledatatable to return_format=html for easier reading in a browser.</p>

                </div>
            </section>
        </div>
        <?php include '../includes/footer.php'; ?>
    </body>
</html>
