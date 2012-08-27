<?php
/*
*  Created By James Johnson of Excellent InGenuity LLC 2012
*  Table View for Order controller - allows waitstaff to select table of the order.
*  Version 1.0
*/
//check_page_permission(333);

?>
<div class="container-fluid main-content">
    <div class="row-fluid">
    	<div class="span10">
    		<div class="side-select">
    			<div class="span3">
	           			&nbsp;
	           		</div>
    			<a class="btn btn-large btn-success side-select-btn" id="A" href="#">Side A</a>
    			<a class="btn btn-large btn-success side-select-btn" id="B" href="#">Side B</a>
    			<div class="span3">
	           			&nbsp;
	           		</div>
    		</div>
	        <div class="container-fluid hidden" id="sideA">
	        	<div class="row-fluid">           		
	        		<div class="span2">
	           			&nbsp;
	           		</div>
	           		<div class="span2">
	           			<div class="table" id="1">1</div>
	           		</div>
	           		<div class="span2">&nbsp;</div>
	           		<div class="span2">
	           			<div class="table" id="7">7</div>
	           		</div>
	           		<div class="span2">
	           			&nbsp;
	           		</div>
	           		<div class="span2">
	           			&nbsp;
	           		</div>
	           	</div>        	
	           	<div class="row-fluid">           		
	           		<div class="span2">
	           			&nbsp;
	           		</div>
	           		<div class="span2">
	           			<div class="table" id="2">2</div>
	           		</div>
	           		<div class="span2">&nbsp;</div>
	           		<div class="span2">
	           			<div class="table" id="8">8</div>
	           		</div>
	           		<div class="span2">
	           			&nbsp;
	           		</div>
	           		<div class="span2">
	           			&nbsp;
	           		</div>
	           	</div>        	
	           	<div class="row-fluid">
	           		<div class="span2">
	           			&nbsp;
	           		</div>
	           		<div class="span2">
	           			<div class="table" id="3">3</div>
	           		</div>
	           		<div class="span2">&nbsp;</div>
	           		<div class="span2">
	           			&nbsp;
	           		</div>
	           		
	           		<div class="span2">
	           			&nbsp;
	           		</div>
	           		<div class="span2">
	           			&nbsp;
	           		</div>
	           	</div>        	
	           	<div class="row-fluid set-row">
	           		<div class="span2">
	           			&nbsp;
	           		</div>
	           		<div class="span2">
	           			<div class="table" id="4">4</div>
	           		</div>
	           		<div class="span2">
	           			&nbsp;
	           		</div>
	           		<div class="span1">
	           			<div class="table" id="9">9</div>
	           		</div>
	           		<div class="span1">
	           			<div class="table" id="10">10</div>
	           		</div>
	           		<div class="span2">
	           			<div class="table large-booth" id="13">13</div>
	           		</div>
	           		
	           		<div class="span2">
	           			&nbsp;
	           		</div>
	           	</div>        	
	           	<div class="row-fluid after-set">
	           		<div class="span2">
	           			&nbsp;
	           		</div>
	           		<div class="span2">
	           			<div class="table" id="5">5</div>
	           		</div>
	           		<div class="span2">&nbsp;</div>
	           		<div class="span1">
	           			<div class="table" id="11">11</div>
	           		</div>
	           		<div class="span1">
	           			&nbsp;
	           		</div>
	           		<div class="span2">
	           			&nbsp;
	           		</div>
	           		<div class="span2">
	           			&nbsp;
	           		</div>
	           	</div>        	
	           	<div class="row-fluid">
	           		<div class="span2">
	           			&nbsp;
	           		</div>
	           		<div class="span2">
	           			<div class="table" id="6">6</div>
	           		</div>
	           		<div class="span2">
	           			&nbsp;
	           		</div>
	           		<div class="span2">
	           			<div class="table" id="12">12</div>
	           		</div>
	           		
	           		<div class="span2">
	           			&nbsp;
	           		</div>
	           		<div class="span2">
	           			&nbsp;
	           		</div>
	           	</div>
	           	<hr />
	           	<div class="row-fluid">
	           		<div class="span2">
	           			&nbsp;
	           		</div>
	           		<div class="span1">
	           			<div class="table" id="14">14</div>
	           		</div>
	           		<div class="span1">
	           			&nbsp;
	           		</div>
	           		<div class="span1">
	           			<div class="table" id="15">15</div>
	           		</div>
	           		
	           		<div class="span1">
	           			&nbsp;
	           		</div>
	           		<div class="span1">
	           			<div class="table" id="16">16</div>
	           		</div>
	           		<div class="span1">
	           			&nbsp;
	           		</div>
	           		<div class="span1">
	           			<div class="table" id="17">17</div>
	           		</div>
	           		<div class="span1">
	           			&nbsp;
	           		</div>
	           	</div>
	        </div>
	        <div class="container-fluid hidden" id="sideB">
	        	<div class="row-fluid">
	        		<div class="span2">
	           			&nbsp;
	           		</div>
	           		<div class="span2">
	           			<div class="table" id="18">18</div>
	           		</div>
	           		<div class="span2">&nbsp;</div>
	           		<div class="span2">
	           			<div class="table" id="24">24</div>
	           		</div>
	           		<div class="span2">
	           			&nbsp;
	           		</div>
	           		
	           		<div class="span2">
	           			&nbsp;
	           		</div>
	           	</div>        	
	           	<div class="row-fluid">
	           		<div class="span2">
	           			&nbsp;
	           		</div>
					<div class="span2">
	           			&nbsp;
	           		</div>
	           		<div class="span2">&nbsp;</div>
	           		<div class="span2">
	           			<div class="table" id="25">25</div>
	           		</div>
	           		<div class="span2">
	           			&nbsp;
	           		</div>
	           		<div class="span2">
	           			&nbsp;
	           		</div>
	           	</div>        	
	           	<div class="row-fluid">
	           		<div class="span2">
	           			&nbsp;
	           		</div>
	           		<div class="span2">
	           			<div class="table" id="19">19</div>
	           		</div>
	           		<div class="span2">&nbsp;</div>
	           		<div class="span2">
	           			<div class="table" id="26">26</div>
	           		</div>
	           		
	           		<div class="span2">
	           			&nbsp;
	           		</div>
	           		<div class="span2">
	           			&nbsp;
	           		</div>
	           	</div>        	
	           	<div class="row-fluid">
	           		<div class="span1">&nbsp;</div>
	           		<div class="span1">
	           			<div class="table" id="20">20</div>
	           		</div>
	           		<div class="span1">
	           			<div class="table" id="21">21</div>
	           		</div>
	           		<div class="span1">&nbsp;</div>
	           		<div class="span2">
	           			&nbsp;
	           		</div>
	           		<div class="span2">
	           			<div class="table" id="27">27</div>
	           		</div>
	           		<div class="span2">
	           			&nbsp;
	           		</div>
	           		<div class="span2">
	           			&nbsp;
	           		</div>
	           	</div>        	
	            <div class="row-fluid">
	           		<div class="span1">&nbsp;</div>
	           		<div class="span1">
	           			<div class="table" id="22">22</div>
	           		</div>
	           		<div class="span1">
	           			<div class="table" id="23">23</div>
	           		</div>
	           		<div class="span1">&nbsp;</div>
	           		<div class="span2">
	           			&nbsp;
	           		</div>
	           		<div class="span2">
	           			<div class="table" id="28">28</div>
	           		</div>
	           		<div class="span2">
	           			&nbsp;
	           		</div>
	           		<div class="span2">
	           			&nbsp;
	           		</div>
	           	</div>        	
	           	<hr />
	           	<div class="row-fluid">
	           		<div class="span2">
	           			&nbsp;
	           		</div>
	           		<div class="span1">
	           			<div class="table" id="29">29</div>
	           		</div>
	           		<div class="span1">
	           			&nbsp;
	           		</div>
	           		<div class="span1">
	           			<div class="table" id="30">30</div>
	           		</div>
	           		
	           		<div class="span1">
	           			&nbsp;
	           		</div>
	           		<div class="span1">
	           			<div class="table" id="31">31</div>
	           		</div>
	           		<div class="span1">
	           			&nbsp;
	           		</div>
	           		<div class="span1">
	           			<div class="table" id="32">32</div>
	           		</div>
	           		<div class="span1">
	           			&nbsp;
	           		</div>
	           	</div>
	        </div>
            <?php
			echo form_open('order/table');
			echo form_input('table', '', 'class="hidden" id="table"');
        	echo form_submit('Submit', 'table', 'class="btn hidden"');
			?>
			<script type="text/javascript">
			$('.table').click(function(e){
				var me = $(this).attr("id");
				$('#table').attr('value', me);
				$('.btn').trigger('click');	
			});	
			</script>
			<script type="text/javascript">
				$('.side-select-btn').click(function(e){
					var me = $(this).attr("id");
					$('.side-select').hide();
					if(me == 'A'){
						$('#sideA').removeClass('hidden');
					}
					if(me == 'B'){
						$('#sideB').removeClass('hidden');
					}
				});
			</script>	
        </div>
        <?php $this->load->view('partials/right_side_bar'); ?> 
    </div>
</div>
