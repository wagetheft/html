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
                                <tr><td><p>case_id</p></td><td><p>county</p></td></tr>
                                <tr><td><p>trade_name</p></td><td><p>state_fips_code</p></td></tr>
                                <tr><td><p>legal_name</p></td><td><p>county_fips_code</p></td></tr>
                                <tr><td><p>street_address</p></td><td><p>combined_state_county_fips</p></td></tr>
                                <tr><td><p>city</p></td><td><p>full_naics_code</p></td></tr>
                                <tr><td><p>state</p></td><td><p>full_naics_description</p></td></tr>
                                <tr><td><p>zip</p></td><td><p>naics2</p></td></tr>
                                <tr><td><p>latitude</p></td><td><p>naics2_description</p></td></tr>
                                <tr><td><p>longitude</p></td><td><p>naics3</p></td></tr>
                                <tr><td><p>industry</p></td><td><p>naics3_description</p></td></tr>
                                <tr><td><p>backwages</p></td><td><p>naics4</p></td></tr>
                                <tr><td><p>employees_owed_backwages</p></td><td><p>naics4_description</p></td></tr>
                                <tr><td><p>civil_money_penalties</p></td><td><p>minimum_wage_and_overtime_backwages</p></td></tr>
                                <tr><td><p>findings_start_date</p></td><td><p>employees_owed_minimum_wage_and_overtime_backwages</p></td></tr>
                                <tr><td><p>findings_end_date</p></td><td><p>minimum_wage_backwages</p></td></tr>
                                <tr><td><p></p></td><td><p>overtime_backwages</p></td></tr>
                                <tr><td><p></p></td><td><p>retaliation_backwages</p></td></tr>
                            </tbody>
                        </table>
                    </div>

                    <h2>API call for minimum wage violations by industry for CA</h2>
                    <div class="section">
                        <p><a class="code" href="http://stopwagetheft.stanford.edu/api/v1/cases?columns=industry,sum(minimum_wage_backwages)&order=minimum_wage_backwages%20desc&where=state=%27CA%27&return_format=googledatatable">http://stopwagetheft.stanford.edu/api/v1/cases?columns=industry,sum(minimum_wage_backwages)&amp;order=minimum_wage_backwages%20desc&amp;where=state=%27CA%27&amp;return_format=googledatatable</a></p><p>Here the API call adds up all the minimum wage backwages by industry, orders the results in descending order by the backwages, limits the results only to California, and returns the results in the "googledatatable" format which can be immediately read by Google Maps and Charts API. After clicking on the link try changing return_format=googledatatable to return_format=html for easier reading in a browser.</p>
                    </div>

                    <h2>Visualization examples using the API</h2>
                    <div class="section">
                        <table>
                            <tr>
                                <th>Visualization</th><th>Api call used</th>
                            </tr>
                            <tr>
                                <td><a href="google-chart.html"><h3>Google Pie Chart</h3></a></td>
                                <td><p>http://stopwagetheft.stanford.edu/api/v1/cases?columns=industry,sum(minimum_wage_backwages)&order=minimum_wage_backwages%20desc&where=state=%27CA%27&return_format=html</p></td>
                            </tr>
                            <tr>
                                <td><a href="google-map-states.html"><h3>Google Geo Chart</h3></a></td>
                                <td><p>http://stopwagetheft.stanford.edu/api/v1/cases?columns=state,sum(backwages)&return_format=googledatatable&where=state<>''&order=backwages desc</p></td>
                            </tr>
                            <tr>
                                <td><a href="highmaps-counties.html"><h3>High Maps Counties</h3></a></td>
                                <td><p>http://stopwagetheft.stanford.edu/api/v1/cases?columns=county_fips_code,state,county,sum(backwages)&where=county_fips_code%20is%20not%20null</p></td>
                            </tr>
                            <tr>
                                <td><a href="highmaps-states.html"><h3>High Maps States</h3></a></td>
                                <td><p>http://stopwagetheft.stanford.edu/api/v1/cases?columns=state,sum(backwages)&where=state%20is%20not%20null</p></td>
                            </tr>
                            <tr>
                                <td><a href="jquery-datatables.html"><h3>jQuery Data Tables</h3></a></td>
                                <td><p>http://stopwagetheft.stanford.edu/api/v1/cases?columns=case_id,legal_name,trade_name,employees_owed_backwages,backwages</p></td>
                            </tr>
                            <tr>
                                <td><a href="z-crossfilter-sample.html"><h3>Crossfilter Test</h3></a></td>
                                <td><p>http://stopwagetheft.stanford.edu/api/v1/cases?columns=city,county,industry,backwages&state=CA&limit=0</p></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </section>
        </div>
        <?php include '../includes/footer.php'; ?>
    </body>
</html>
