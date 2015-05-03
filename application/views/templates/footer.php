	<? if (strcmp($this->router->fetch_class(), "home") === 0)
                echo '</div>' ;?> 
    <div id="footer" class="container">
    		<div class="row">
    			<div class="col-md-2 col-md-offset-5">
                    <div class="center-footer">
        			    <? echo '<a href="https://validator.w3.org/check?uri=http%3A%2F%2Fblitz.besaba.com" target="_blank">' . img("HTML5_Logo.png", "", "HTML5 Logo") . '</a>'; ?>
                        <div class="achecker">
                            <a href="http://achecker.ca/checker/index.php" target="_blank"><p>WAI</p></a>
                            <a href="http://achecker.ca/checker/index.php" target="_blank"><em class="fa fa-check-circle"></em></a>
                        </div>
                    </div>
        		</div>
        	</div>
    </div>
    </body>
</html>