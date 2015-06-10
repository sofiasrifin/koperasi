	    <script type="text/javascript" src="include/selectbox.js"></script>
<body>



	   

        <table width="100%" border="0" cellpadding="0" cellspacing="2">
		 <form name="fm_sendsms" id="fm_sendsms" action="<?=$PHP_SELF?>?cmd=<?=SEND_SMS?>" method="POST">
		   
          <tr>
            <td width="50%" bgcolor="#F9F2FF"><table width="50%" border="0" cellpadding="1" cellspacing="0">
              <tr>
                <td nowrap="nowrap"><strong> By Phonebook: </strong><br />
                    <select name="p_num_dump[]" size="10" multiple="multiple" ondblclick="moveSelectedOptions(this.form['p_num_dump[]'],this.form['p_num[]'])">
                      
                      <option value="ok">ok</option>
                    </select>                </td>
                <td width="10">&nbsp;</td>
                <td align="center" valign="middle"><input name="button" type="button" class="button" onClick="moveSelectedOptions(this.form['p_num_dump[]'],this.form['p_num[]'])" value="&gt;&gt;" />
                    <br />
                  <br />
                    <input name="button" type="button" class="button" onClick="moveAllOptions(this.form['p_num_dump[]'],this.form['p_num[]'])" value="All &gt;&gt;" />
                  <br />
                  <br />
                    <input name="button" type="button" class="button" onClick="moveSelectedOptions(this.form['p_num[]'],this.form['p_num_dump[]'])" value="&lt;&lt;" />
                  <br />
                  <br />
                    <input name="button" type="button" class="button" onClick="moveAllOptions(this.form['p_num[]'],this.form['p_num_dump[]'])" value="All &lt;&lt;" />                </td>
                <td width="10">&nbsp;</td>
                <td nowrap="nowrap"><strong>Selected : </strong><br />
                    <select name="p_num[]" size="10" multiple="multiple" ondblclick="moveSelectedOptions(this.form['p_num[]'],this.form['p_num_dump[]'])">
                    </select>                </td>
              </tr>
            </table>
     
            <br />         </td>
           </tr>
          </form>
        </table>   
