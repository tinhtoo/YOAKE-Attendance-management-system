<link rel="Stylesheet" type="text/css" href="<%= UtilCommon.ResolveClientThemeUrl(Me,"css/editor.css") %>" />
  <script language="javascript" type="text/javascript" src="<%= Me.ResolveClientUrl("~/common/js/common.js") %>"></script>
  <script language="javascript" type="text/javascript" src="<%= Me.ResolveClientUrl("~/common/js/search.js") %>"></script>
  <script language="javascript" type="text/javascript" src="<%= Me.ResolveClientUrl("~/common/js/check.js") %>"></script>
  <script language="javascript" type="text/javascript">
    function ChangeKeycode(){
        if (event.keyCode == 13 && (event.srcElement.type == 'text' || event.srcElement.type == 'select-one' || event.srcElement.type == 'password' || event.srcElement.type == 'checkbox')) {
            return false;
        }
    }

    var subWindowSearchEmp;

    function SetEmpItem(){
        if (subWindowSearchEmp && !subWindowSearchEmp.closed) {
            subWindowSearchEmp.close();
        }

        subWindowSearchEmp = ShowSearchEmpByDeptAuth('<%= txtEmpCd.ClientID %>', '<%= lblEmpName.ClientID %>', '<%= lblDeptName.ClientID %>', '00', 'True');
    }

    function Complete() { $(window).resize();};
      $(function(){ $(window).resize();});
      $(window).resize(function() {
        $('#gridview-container .GridViewPanelStyle1').width(1);
        $('#gridview-container .GridViewPanelStyle1').width($('#contents').width() - 40);
    });

    function ConvertFormatTime(txtTimeClientId) {
        var txtTime = document.getElementById(txtTimeClientId);
        if (Trim(txtTime.value) == '') {
            return false;
        }

        if (txtTime.value.indexOf(':', 0) == -1 && txtTime.value.length == 4) {
            txtTime.value = txtTime.value.substr(0, 2) + ':' + (txtTime.value).substr(2, 2);
            
        }
    }

    function SetAllErrorMessage(cvClientId) {
        var lblErrMsg = document.getElementById('<%= lblErrMsg.ClientID %>');
        lblErrMsg.innerText = '';

        var cvCtrlList = document.getElementById('<%= hdnCvClientIdList.ClientID %>').value.split(",");

        for (var index = 0; index < cvCtrlList.length; index++) {
            var cv = document.getElementById(cvCtrlList[index]);
            if (cvCtrlList[index] != cvClientId) {
                switch (cv.innerText.substr(1, 1)) {
                    case '1':
                        SetErrorMessage(1, '<%= MT99Msg.GetMessage(2002)%>');
                        break;

                    case '2':
                        SetErrorMessage(2, '<%= MT99Msg.GetMessage(2006)%>');
                        break;

                    case '3':
                        SetErrorMessage(3, '<%= MT99Msg.GetMessage(2003)%>');
                        break;
                }
            }
        }

    }

    function CheckTimeValue(sender, e) {
        var cstmVdtCtrl = document.getElementById(sender.id);

        SetAllErrorMessage(cstmVdtCtrl.id);

        var txtValue = Trim(e.Value.replace(/:/g, ''));

        if (Trim(e.Value).length == 0) {
            cstmVdtCtrl.innerText = '';
            e.IsValid = true;
            return true;
        }

        var result = IsNumeric(txtValue, 5, 0);
        if (result != '') {
            cstmVdtCtrl.innerText = '*2';
            SetErrorMessage(2, '<%= MT99Msg.GetMessage(2006)%>');
            e.IsValid = false;
            return false;
        }

        if (txtValue.length == 4) {
            txtValue = txtValue.substr(0, 2) + ':' + txtValue.substr(2, 2);
        }

        if (!txtValue.match(/^([0-9]|[0-2][0-9]|3[0-5]):([0-5][0-9])$/) && !e.Value.match(/^([0-9]|[0-2][0-9]|3[0-5]):([0-5][0-9])$/)) {
            cstmVdtCtrl.innerText = '*3';
            SetErrorMessage(3, '<%= MT99Msg.GetMessage(2003)%>');
            e.IsValid = false;
            return false;
        } else {
            cstmVdtCtrl.innerText = '';
            e.IsValid = true;
            return true;
        }
    }
    
    function CheckHourValue(sender, e) {
        var cstmVdtCtrl = document.getElementById(sender.id);

        SetAllErrorMessage(cstmVdtCtrl.id);
      
        var txtValue = Trim(e.Value.replace(/:/g, ''));

        if (Trim(e.Value).length == 0) {
          cstmVdtCtrl.innerText = '';
          e.IsValid = true;
          return true;
        }

//        if (Trim(e.Value).length == 0) {
//            cstmVdtCtrl.innerText = '*1';
//            SetErrorMessage(1, '<%= MT99Msg.GetMessage(2002)%>');
//            e.IsValid = false;
//            return false;
//        }

        var result = IsNumeric(txtValue, 5, 0);
        if (result != '') {
            cstmVdtCtrl.innerText = '*2';
            SetErrorMessage(2, '<%= MT99Msg.GetMessage(2006)%>');
            e.IsValid = false;
            return false;
        }

        if (txtValue.length == 4) {
            txtValue = txtValue.substr(0, 2) + ':' + txtValue.substr(2, 2);
        }

        if (!txtValue.match(/^([0-9]|[0-2][0-9]|3[0-5]):([0-5][0-9])$/) && !e.Value.match(/^([0-9]|[0-2][0-9]|3[0-5]):([0-5][0-9])$/)) {
            cstmVdtCtrl.innerText = '*3';
            SetErrorMessage(3, '<%= MT99Msg.GetMessage(2003)%>');
            e.IsValid = false;
            return false;
        } else {
            cstmVdtCtrl.innerText = '';
            e.IsValid = true;
            return true;
        }
    }

    function SetErrorMessage(errNo, errMsg) {
        var lblErrMsg = document.getElementById('<%= lblErrMsg.ClientID %>');
        if (lblErrMsg.innerText.indexOf("*" + errNo) == -1) {
            if (Trim(lblErrMsg.innerText).length == 0) {
                lblErrMsg.innerText = '*' + errNo + ' ' + errMsg; 
            }else {
                lblErrMsg.innerText += '\n*' + errNo + ' ' + errMsg;

                var errMsgs = lblErrMsg.innerText.split('\n');
                errMsgs.sort();

                lblErrMsg.innerText = '';

                for (index = 0; index <= errMsgs.length - 1; index++) {
                    if (Trim(lblErrMsg.innerText).length == 0) {
                        lblErrMsg.innerText = errMsgs[index];
                    }else {
                        lblErrMsg.innerText += '\n' + errMsgs[index];
                    }
                } 
            }
        }
    }

    function CloseSubWindow() {
      if (subWindowSearchEmp && !subWindowSearchEmp.closed) {
        subWindowSearchEmp.close();
      }
    }

    $(window).unload(function() {
      CloseSubWindow();
    });

    function SetTargetDate() {
        var ddlTargetYear = document.getElementById('<%= ddlTargetYear.ClientID %>');
        var hdnTargetYear = document.getElementById('<%= hdnTargetYear.ClientID %>');

        hdnTargetYear.value = ddlTargetYear.options[ddlTargetYear.selectedIndex].value;

        var ddlTargetMonth = document.getElementById('<%= ddlTargetMonth.ClientID %>');
        var hdnTargetMonth = document.getElementById('<%= hdnTargetMonth.ClientID %>');

        hdnTargetMonth.value = ddlTargetMonth.options[ddlTargetMonth.selectedIndex].value;
    }
  </script>