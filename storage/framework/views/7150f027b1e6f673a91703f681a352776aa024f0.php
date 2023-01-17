<?php $__env->startSection('title', '勤怠管理システム_main'); ?>
<?php echo $__env->make('common.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('menu.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startSection('main'); ?>
    <table id="body" style="height: 883px;">
        <tr>
            <td class="body-border"></td>
            <td id="menu">
                <?php if(isset($menu_list)): ?>
                <div class="sidenav">
                    <input type="button" class="WorkTmMngMenuFirst" value="勤怠管理システムメニュー" />
                    <?php if(key_exists('01', $menu_list)): ?>
                    <button class="dropdown-btn WorkTmMngMenuSecond">勤怠管理</button>
                    <div id="01" class="WorkTmMngMenuThird"
                            <?php if(isset($this_pg_cd) && $this_pg_cd['mcls'] === '01'): ?>
                            style="display:block;"
                            <?php endif; ?>>
                        <?php if(key_exists('010001', $menu_list['01'])): ?>
                        <a id="010001" href="<?php echo e(url('/work_time/WorkTimeEditor')); ?>"
                            <?php if(isset($this_pg_cd) && $this_pg_cd['pg'] === '010001'): ?>
                            class='WorkTmMngMenuStaticSelectedStyle' style="padding-left: 16px"
                            <?php else: ?>
                            ><i class="fas fa-caret-right pg-head"></i
                            <?php endif; ?>
                            >出退勤入力
                        </a>
                        <?php endif; ?>
                        <?php if(key_exists('010005', $menu_list['01'])): ?>
                        <a id="010005" href="<?php echo e(url('/work_time/WorkTimeDeptEditor')); ?>"
                            <?php if(isset($this_pg_cd) && $this_pg_cd['pg'] === '010005'): ?>
                            class='WorkTmMngMenuStaticSelectedStyle' style="padding-left: 16px"
                            <?php else: ?>
                            ><i class="fas fa-caret-right pg-head"></i
                            <?php endif; ?>
                            >出退勤入力(部門別)
                        </a>
                        <?php endif; ?>
                        <?php if(key_exists('010004', $menu_list['01'])): ?>
                        <a id="010004" href="<?php echo e(url('/work_time/EmpWorkStatusReference')); ?>"
                            <?php if(isset($this_pg_cd) && $this_pg_cd['pg'] === '010004'): ?>
                            class='WorkTmMngMenuStaticSelectedStyle' style="padding-left: 16px"
                            <?php else: ?>
                            ><i class="fas fa-caret-right pg-head"></i
                            <?php endif; ?>
                            >出退勤照会
                        </a>
                        <?php endif; ?>
                        <?php if(key_exists('010002', $menu_list['01'])): ?>
                        <a id="010002" href="<?php echo e(url('/work_time/WorkTimeReference')); ?>"
                            <?php if(isset($this_pg_cd) && $this_pg_cd['pg'] === '010002'): ?>
                            class='WorkTmMngMenuStaticSelectedStyle' style="padding-left: 16px"
                            <?php else: ?>
                            ><i class="fas fa-caret-right pg-head"></i
                            <?php endif; ?>
                            >勤務状況照会(個人用)
                        </a>
                        <?php endif; ?>
                        <?php if(key_exists('010003', $menu_list['01'])): ?>
                        <a id="010003" href="<?php echo e(url('/work_time/EmpWorkTimeReference')); ?>"
                            <?php if(isset($this_pg_cd) && $this_pg_cd['pg'] === '010003'): ?>
                            class='WorkTmMngMenuStaticSelectedStyle' style="padding-left: 16px"
                            <?php else: ?>
                            ><i class="fas fa-caret-right pg-head"></i
                            <?php endif; ?>
                            >勤務状況照会(管理者用)
                        </a>
                        <?php endif; ?>
                    </div>
                    <?php endif; ?>
                    <?php if(key_exists('02', $menu_list)): ?>
                    <button class="dropdown-btn WorkTmMngMenuSecond">帳票</i></button>
                    <div id="02" class="WorkTmMngMenuThird"
                            <?php if(isset($this_pg_cd) && $this_pg_cd['mcls'] === '02'): ?>
                            style="display:block;"
                            <?php endif; ?>>
                        <?php if(key_exists('020001', $menu_list['02'])): ?>
                        <a id="020001" href="<?php echo e(url('/form_print/WorkPlanPrint')); ?>"
                            <?php if(isset($this_pg_cd) && $this_pg_cd['pg'] === '020001'): ?>
                            class='WorkTmMngMenuStaticSelectedStyle' style="padding-left: 16px"
                            <?php else: ?>
                            ><i class="fas fa-caret-right pg-head"></i
                            <?php endif; ?>
                            >勤務予定表(週・月別)
                        </a>
                        <?php endif; ?>
                        <?php if(key_exists('020002', $menu_list['02'])): ?>
                        <a id="020002" href="<?php echo e(url('/form_print/WorkTimePrint')); ?>"
                            <?php if(isset($this_pg_cd) && $this_pg_cd['pg'] === '020002'): ?>
                            class='WorkTmMngMenuStaticSelectedStyle' style="padding-left: 16px"
                            <?php else: ?>
                            ><i class="fas fa-caret-right pg-head"></i
                            <?php endif; ?>
                            >勤務実績表(日・週・月別)
                        </a>
                        <?php endif; ?>
                        <?php if(key_exists('020003', $menu_list['02'])): ?>
                        <a id="020003" href="<?php echo e(url('/form_print/TimeStampPrint')); ?>"
                            <?php if(isset($this_pg_cd) && $this_pg_cd['pg'] === '020003'): ?>
                            class='WorkTmMngMenuStaticSelectedStyle' style="padding-left: 16px"
                            <?php else: ?>
                            ><i class="fas fa-caret-right pg-head"></i
                            <?php endif; ?>
                            >未打刻／二重打刻一覧表
                        </a>
                        <?php endif; ?>
                        <?php if(key_exists('020004', $menu_list['02'])): ?>
                        <a id="020004" href="<?php echo e(url('/form_print/ReasonWorkPtnPrint')); ?>"
                            <?php if(isset($this_pg_cd) && $this_pg_cd['pg'] === '020004'): ?>
                            class='WorkTmMngMenuStaticSelectedStyle' style="padding-left: 16px"
                            <?php else: ?>
                            ><i class="fas fa-caret-right pg-head"></i
                            <?php endif; ?>
                            >事由／勤怠一覧表
                        </a>
                        <?php endif; ?>
                        <?php if(key_exists('020005', $menu_list['02'])): ?>
                        <a id="020005" href="<?php echo e(url('/form_print/OvertimeAplPrint')); ?>"
                            <?php if(isset($this_pg_cd) && $this_pg_cd['pg'] === '020005'): ?>
                            class='WorkTmMngMenuStaticSelectedStyle' style="padding-left: 16px"
                            <?php else: ?>
                            ><i class="fas fa-caret-right pg-head"></i
                            <?php endif; ?>
                            >残業申請書
                        </a>
                        <?php endif; ?>
                    </div>
                    <?php endif; ?>
                    <?php if(key_exists('03', $menu_list)): ?>
                    <button class="dropdown-btn WorkTmMngMenuSecond">シフト管理</button>
                    <div id="03" class="WorkTmMngMenuThird"
                            <?php if(isset($this_pg_cd) && $this_pg_cd['mcls'] === '03'): ?>
                            style="display:block;"
                            <?php endif; ?>>
                        <?php if(key_exists('030001', $menu_list['03'])): ?>
                        <a id="030001" href="<?php echo e(url('/shift/MT04ShiftPtnReference')); ?>"
                            <?php if(isset($this_pg_cd) && $this_pg_cd['pg'] === '030001'): ?>
                            class='WorkTmMngMenuStaticSelectedStyle' style="padding-left: 16px"
                            <?php else: ?>
                            ><i class="fas fa-caret-right pg-head"></i
                            <?php endif; ?>
                            >シフトパターン情報入力
                        </a>
                        <?php endif; ?>
                        <?php if(key_exists('030003', $menu_list['03'])): ?>
                        <a id="030003" href="<?php echo e(url('/shift/MonthShiftEditor')); ?>"
                            <?php if(isset($this_pg_cd) && $this_pg_cd['pg'] === '030003'): ?>
                            class='WorkTmMngMenuStaticSelectedStyle' style="padding-left: 16px"
                            <?php else: ?>
                            ><i class="fas fa-caret-right pg-head"></i
                            <?php endif; ?>
                            >月別シフト入力
                        </a>
                        <?php endif; ?>
                        <?php if(key_exists('030004', $menu_list['03'])): ?>
                        <a id="030004" href="<?php echo e(url('/shift/MonthShiftEmpEditor')); ?>"
                            <?php if(isset($this_pg_cd) && $this_pg_cd['pg'] === '030004'): ?>
                            class='WorkTmMngMenuStaticSelectedStyle' style="padding-left: 16px"
                            <?php else: ?>
                            ><i class="fas fa-caret-right pg-head"></i
                            <?php endif; ?>
                            >社員別月別シフト入力
                        </a>
                        <?php endif; ?>
                    </div>
                    <?php endif; ?>
                    <?php if(key_exists('04', $menu_list)): ?>
                    <button class="dropdown-btn WorkTmMngMenuSecond">管理業務</button>
                    <div id="04" class="WorkTmMngMenuThird"
                            <?php if(isset($this_pg_cd) && $this_pg_cd['mcls'] === '04'): ?>
                            style="display:block;"
                            <?php endif; ?>>
                        <?php if(key_exists('040001', $menu_list['04'])): ?>
                        <a id="040001" href="<?php echo e(url('/mng_oprt/MT03CalendarEditor')); ?>"
                            <?php if(isset($this_pg_cd) && $this_pg_cd['pg'] === '040001'): ?>
                            class='WorkTmMngMenuStaticSelectedStyle' style="padding-left: 16px"
                            <?php else: ?>
                            ><i class="fas fa-caret-right pg-head"></i
                            <?php endif; ?>
                            >カレンダー情報入力
                        </a>
                        <?php endif; ?>
                        <?php if(key_exists('040002', $menu_list['04'])): ?>
                        <a id="040002" href="<?php echo e(url('/mng_oprt/ShiftCalendarCarryOver')); ?>"
                            <?php if(isset($this_pg_cd) && $this_pg_cd['pg'] === '040002'): ?>
                            class='WorkTmMngMenuStaticSelectedStyle' style="padding-left: 16px"
                            <?php else: ?>
                            ><i class="fas fa-caret-right pg-head"></i
                            <?php endif; ?>
                            >シフト月次更新処理
                        </a>
                        <?php endif; ?>
                        <?php if(key_exists('040006', $menu_list['04'])): ?>
                        <a id="040006" href="<?php echo e(url('/mng_oprt/WorkTimeFix')); ?>"
                            <?php if(isset($this_pg_cd) && $this_pg_cd['pg'] === '040006'): ?>
                            class='WorkTmMngMenuStaticSelectedStyle' style="padding-left: 16px"
                            <?php else: ?>
                            ><i class="fas fa-caret-right pg-head"></i
                            <?php endif; ?>
                            >月次確定処理
                        </a>
                        <?php endif; ?>
                        <?php if(key_exists('040009', $menu_list['04'])): ?>
                        <a id="040009" href="<?php echo e(url('/mng_oprt/WorkTimeFixReference')); ?>"
                            <?php if(isset($this_pg_cd) && $this_pg_cd['pg'] === '040009'): ?>
                            class='WorkTmMngMenuStaticSelectedStyle' style="padding-left: 16px"
                            <?php else: ?>
                            ><i class="fas fa-caret-right pg-head"></i
                            <?php endif; ?>
                            >月次確定状況照会
                        </a>
                        <?php endif; ?>
                        <?php if(key_exists('040003', $menu_list['04'])): ?>
                        <a id="040003" href="<?php echo e(url('/mng_oprt/WorkTimeConvert')); ?>"
                            <?php if(isset($this_pg_cd) && $this_pg_cd['pg'] === '040003'): ?>
                            class='WorkTmMngMenuStaticSelectedStyle' style="padding-left: 16px"
                            <?php else: ?>
                            ><i class="fas fa-caret-right pg-head"></i
                            <?php endif; ?>
                            >最新打刻情報取得処理
                        </a>
                        <?php endif; ?>
                        
                        <?php if(key_exists('040007', $menu_list['04'])): ?>
                        <a id="040007" href="<?php echo e(url('/mng_oprt/WorkTimeClear')); ?>"
                            <?php if(isset($this_pg_cd) && $this_pg_cd['pg'] === '040007'): ?>
                            class='WorkTmMngMenuStaticSelectedStyle' style="padding-left: 16px"
                            <?php else: ?>
                            ><i class="fas fa-caret-right pg-head"></i
                            <?php endif; ?>
                            >出退勤情報クリア処理
                        </a>
                        <?php endif; ?>
                        <?php if(key_exists('040011', $menu_list['04'])): ?>
                        <a id="040011" href="<?php echo e(url('/mng_oprt/CalendarClear')); ?>"
                            <?php if(isset($this_pg_cd) && $this_pg_cd['pg'] === '040011'): ?>
                            class='WorkTmMngMenuStaticSelectedStyle' style="padding-left: 16px"
                            <?php else: ?>
                            ><i class="fas fa-caret-right pg-head"></i
                            <?php endif; ?>
                            >カレンダー情報クリア処理
                        </a>
                        <?php endif; ?>
                        
                        
                        
                        <?php if(key_exists('042000', $menu_list['04'])): ?>
                        <a id="042000" href="<?php echo e(url('/mng_oprt/WorkTimeExport')); ?>"
                            <?php if(isset($this_pg_cd) && $this_pg_cd['pg'] === '042000'): ?>
                            class='WorkTmMngMenuStaticSelectedStyle' style="padding-left: 16px"
                            <?php else: ?>
                            ><i class="fas fa-caret-right pg-head"></i
                            <?php endif; ?>
                            >勤務実績情報出力
                        </a>
                        <?php endif; ?>
                    </div>
                    <?php endif; ?>
                    <?php if(key_exists('00', $menu_list)): ?>
                    <button class="dropdown-btn WorkTmMngMenuSecond">マスタ</i></button>
                    <div id="00" class="WorkTmMngMenuThird"
                            <?php if(isset($this_pg_cd) && $this_pg_cd['mcls'] === '00'): ?>
                            style="display:block;"
                            <?php endif; ?>>
                        <?php if(key_exists('000001', $menu_list['00'])): ?>
                        <a id="000001" href="<?php echo e(url('/master/MT10EmpReference')); ?>"
                            <?php if(isset($this_pg_cd) && $this_pg_cd['pg'] === '000001'): ?>
                            class='WorkTmMngMenuStaticSelectedStyle' style="padding-left: 16px"
                            <?php else: ?>
                            ><i class="fas fa-caret-right pg-head"></i
                            <?php endif; ?>
                            >社員情報入力
                        </a>
                        <?php endif; ?>
                        <?php if(key_exists('000002', $menu_list['00'])): ?>
                        <a id="000002" href="<?php echo e(url('/master/MT11LoginReference')); ?>"
                            <?php if(isset($this_pg_cd) && $this_pg_cd['pg'] === '000002'): ?>
                            class='WorkTmMngMenuStaticSelectedStyle' style="padding-left: 16px"
                            <?php else: ?>
                            ><i class="fas fa-caret-right pg-head"></i
                            <?php endif; ?>
                            >ログイン情報入力
                        </a>
                        <?php endif; ?>
                        <?php if(key_exists('000014', $menu_list['00'])): ?>
                        <a id="000014" href="<?php echo e(url('/master/MT11PasswordEditor')); ?>"
                            <?php if(isset($this_pg_cd) && $this_pg_cd['pg'] === '000014'): ?>
                            class='WorkTmMngMenuStaticSelectedStyle' style="padding-left: 16px"
                            <?php else: ?>
                            ><i class="fas fa-caret-right pg-head"></i
                            <?php endif; ?>
                            >パスワード変更入力
                        </a>
                        <?php endif; ?>
                        <?php if(key_exists('000003', $menu_list['00'])): ?>
                        <a id="000003" href="<?php echo e(url('/master/MT14PGAuthReference')); ?>"
                            <?php if(isset($this_pg_cd) && $this_pg_cd['pg'] === '000003'): ?>
                            class='WorkTmMngMenuStaticSelectedStyle' style="padding-left: 16px"
                            <?php else: ?>
                            ><i class="fas fa-caret-right pg-head"></i
                            <?php endif; ?>
                            >機能権限情報入力
                        </a>
                        <?php endif; ?>
                        <?php if(key_exists('000004', $menu_list['00'])): ?>
                        <a id="000004" href="<?php echo e(url('/master/MT12DeptReference')); ?>"
                            <?php if(isset($this_pg_cd) && $this_pg_cd['pg'] === '000004'): ?>
                            class='WorkTmMngMenuStaticSelectedStyle' style="padding-left: 16px"
                            <?php else: ?>
                            ><i class="fas fa-caret-right pg-head"></i
                            <?php endif; ?>
                            >部門情報入力
                        </a>
                        <?php endif; ?>
                        <?php if(key_exists('000018', $menu_list['00'])): ?>
                        <a id="000018" href="<?php echo e(url('/master/MT12OrgReference')); ?>"
                            <?php if(isset($this_pg_cd) && $this_pg_cd['pg'] === '000018'): ?>
                            class='WorkTmMngMenuStaticSelectedStyle' style="padding-left: 16px"
                            <?php else: ?>
                            ><i class="fas fa-caret-right pg-head"></i
                            <?php endif; ?>
                            >組織変更入力
                        </a>
                        <?php endif; ?>
                        <?php if(key_exists('000005', $menu_list['00'])): ?>
                        <a id="000005" href="<?php echo e(url('/master/MT13DeptAuthReference')); ?>"
                            <?php if(isset($this_pg_cd) && $this_pg_cd['pg'] === '000005'): ?>
                            class='WorkTmMngMenuStaticSelectedStyle' style="padding-left: 16px"
                            <?php else: ?>
                            ><i class="fas fa-caret-right pg-head"></i
                            <?php endif; ?>
                            >部門権限情報入力
                        </a>
                        <?php endif; ?>
                        <?php if(key_exists('000012', $menu_list['00'])): ?>
                        <a id="000012" href="<?php echo e(url('/master/MT08HolidayEditor')); ?>"
                            <?php if(isset($this_pg_cd) && $this_pg_cd['pg'] === '000012'): ?>
                            class='WorkTmMngMenuStaticSelectedStyle' style="padding-left: 16px"
                            <?php else: ?>
                            ><i class="fas fa-caret-right pg-head"></i
                            <?php endif; ?>
                            >祝祭日・会社休日情報入力
                        </a>
                        <?php endif; ?>
                        <?php if(key_exists('000006', $menu_list['00'])): ?>
                        <a id="000006" href="<?php echo e(url('/master/MT05WorkPtnReference')); ?>"
                            <?php if(isset($this_pg_cd) && $this_pg_cd['pg'] === '000006'): ?>
                            class='WorkTmMngMenuStaticSelectedStyle' style="padding-left: 16px"
                            <?php else: ?>
                            ><i class="fas fa-caret-right pg-head"></i
                            <?php endif; ?>
                            >勤務体系情報入力
                        </a>
                        <?php endif; ?>
                        <?php if(key_exists('000007', $menu_list['00'])): ?>
                        <a id="000007" href="<?php echo e(url('/master/MT07FractionEditor')); ?>"
                            <?php if(isset($this_pg_cd) && $this_pg_cd['pg'] === '000007'): ?>
                            class='WorkTmMngMenuStaticSelectedStyle' style="padding-left: 16px"
                            <?php else: ?>
                            ><i class="fas fa-caret-right pg-head"></i
                            <?php endif; ?>
                            >端数処理情報入力
                        </a>
                        <?php endif; ?>
                        <?php if(key_exists('000008', $menu_list['00'])): ?>
                        <a id="000008" href="<?php echo e(url('/master/MT02CalendarPtnReference')); ?>"
                            <?php if(isset($this_pg_cd) && $this_pg_cd['pg'] === '000008'): ?>
                            class='WorkTmMngMenuStaticSelectedStyle' style="padding-left: 16px"
                            <?php else: ?>
                            ><i class="fas fa-caret-right pg-head"></i
                            <?php endif; ?>
                            >カレンダーパターン情報入力
                        </a>
                        <?php endif; ?>
                        <?php if(key_exists('000010', $menu_list['00'])): ?>
                        <a id="000010" href="<?php echo e(url('/master/MT06OverTmLmtEditor')); ?>"
                            <?php if(isset($this_pg_cd) && $this_pg_cd['pg'] === '000010'): ?>
                            class='WorkTmMngMenuStaticSelectedStyle' style="padding-left: 16px"
                            <?php else: ?>
                            ><i class="fas fa-caret-right pg-head"></i
                            <?php endif; ?>
                            >残業上限情報入力
                        </a>
                        <?php endif; ?>
                        <?php if(key_exists('000011', $menu_list['00'])): ?>
                        <a id="000011" href="<?php echo e(url('/master/MT01ControlEditor')); ?>"
                            <?php if(isset($this_pg_cd) && $this_pg_cd['pg'] === '000011'): ?>
                            class='WorkTmMngMenuStaticSelectedStyle' style="padding-left: 16px"
                            <?php else: ?>
                            ><i class="fas fa-caret-right pg-head"></i
                            <?php endif; ?>
                            >基本情報入力
                        </a>
                        <?php endif; ?>
                        <?php if(key_exists('000019', $menu_list['00'])): ?>
                        <a id="000019" href="<?php echo e(url('/master/MT10EmpCnvert')); ?>"
                            <?php if(isset($this_pg_cd) && $this_pg_cd['pg'] === '000019'): ?>
                            class='WorkTmMngMenuStaticSelectedStyle' style="padding-left: 16px"
                            <?php else: ?>
                            ><i class="fas fa-caret-right pg-head"></i
                            <?php endif; ?>
                            >社員番号一括変換
                        </a>
                        <?php endif; ?>
                        <?php if(key_exists('000020', $menu_list['00'])): ?>
                        <a id="000020" href="<?php echo e(url('/master/EmpExport')); ?>"
                            <?php if(isset($this_pg_cd) && $this_pg_cd['pg'] === '000020'): ?>
                            class='WorkTmMngMenuStaticSelectedStyle' style="padding-left: 16px"
                            <?php else: ?>
                            ><i class="fas fa-caret-right pg-head"></i
                            <?php endif; ?>
                            >社員情報書出処理
                        </a>
                        <?php endif; ?>
                        <?php if(key_exists('000021', $menu_list['00'])): ?>
                        <a id="000021" href="<?php echo e(url('/master/EmpImport')); ?>"
                            <?php if(isset($this_pg_cd) && $this_pg_cd['pg'] === '000021'): ?>
                            class='WorkTmMngMenuStaticSelectedStyle' style="padding-left: 16px"
                            <?php else: ?>
                            ><i class="fas fa-caret-right pg-head"></i
                            <?php endif; ?>
                            >社員情報取込処理
                        </a>
                        <?php endif; ?>
                        <?php if(key_exists('000022', $menu_list['00'])): ?>
                        <a id="000022" href="<?php echo e(url('/master/MT23CompanyReference')); ?>"
                            <?php if(isset($this_pg_cd) && $this_pg_cd['pg'] === '000022'): ?>
                            class='WorkTmMngMenuStaticSelectedStyle' style="padding-left: 16px"
                            <?php else: ?>
                            ><i class="fas fa-caret-right pg-head"></i
                            <?php endif; ?>
                            >所属情報入力
                        </a>
                        <?php endif; ?>
                    </div>
                    <?php endif; ?>
                </div>
                <?php endif; ?>
            </td>
            <td class="body-border" id="vertical-splitter">
                <p title="折り畳み/展開"></p>
            </td>
            <td id="contents">
                <div id="contents-container">
                    <div id="contents-sitemap">
                        <?php if(isset($this_pg_cd) && $this_pg_cd['mcls'] !== ''): ?>
                        <span id=sitemappath style="font-family: verdana">
                            <span>
                                <a title="勤怠管理システムメニュー" style="color: #1c5e55">勤怠管理システムメニュー</a>
                            </span>
                            <span style="color: #1c5e55">＞</span>
                            <span>
                                <a title="マスタ" style="color: #666666" id="pathMenuSecond">
                                    <?php echo e($menu_list[$this_pg_cd['mcls']]['MCLS_NAME']); ?>

                                </a>
                            </span>
                            <span style="color: #1c5e55">＞</span>
                            <span style="font-weight: bold; color: #333333" id="pathMenuThird">
                                <?php echo e($menu_list[$this_pg_cd['mcls']][$this_pg_cd['pg']]); ?>

                            </span>
                        </span>
                        <?php endif; ?>
                        <span style="padding:1em"></span>
                    </div>
                    <?php echo $__env->yieldContent('content'); ?>
                </div>
            </td>
        </tr>
    </table>

    <script>
        // 勤怠管理システムメニュー　一覧表示処理
        var dropdown = document.getElementsByClassName("dropdown-btn");
        var i;

        for (i = 0; i < dropdown.length; i++) {
            dropdown[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var dropdownContent = this.nextElementSibling;
                if (dropdownContent.style.display === "block") {
                    dropdownContent.style.display = "none";
                } else {
                    dropdownContent.style.display = "block";
                }
            });
        }


        $(function(){
            $('#vertical-splitter').click(function() {
                if ($('#menu').css('display') == 'none') {
                    $('#menu').css('display', 'table-cell');
                    $('#vertical-splitter p').removeClass('on');
                } else {
                    $('#menu').hide();
                    $('#vertical-splitter p').addClass('on');
                }
                $(window).resize();
            });

            // すべて閉じる
            $('table.WorkTmMngMenuThird').parent().parent().hide();

            // 「勤怠管理システムメニュー」押下時のメニュー開閉
            $(".WorkTmMngMenuFirst").click(function() {
                var anyOpened = $(".WorkTmMngMenuThird:visible").length > 0;
                if (anyOpened) {
                    $('.WorkTmMngMenuThird').hide();
                } else {
                    $('.WorkTmMngMenuThird').show();
                }
            });
        });

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('common.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\06_SVN\resources\views/menu/main.blade.php ENDPATH**/ ?>