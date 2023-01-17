$(function() {
    // 入力可能文字：半角英数
    onlyHalfWord = n => n.replace(/[０-９：]/g, s => String.fromCharCode(s.charCodeAt(0) - 65248))
        .replace(/[^0-9:]/g, '');

    // 入力可能文字：半角英数字・文字
    onlyHalfNumWord = n => n.replace(/[０-９Ａ-Ｚａ-ｚ]/g, s => String.fromCharCode(s.charCodeAt(0) - 65248))
        .replace(/[^0-9a-zA-Z]/g, '');

    // 時間書式チェック
    var timeFormatCheck = function(e) {
        var targetTd = $(e.target).closest('td');

        var targetInput = targetTd.find('input[type=text]').val(); // 入力値

        // 「:」が無い4桁の数字の場合、「:」を追加する。
        if (targetInput && targetInput.length === 4 && !isNaN(targetInput)) {
            targetInput = targetInput.slice(0,2) + ':' + targetInput.slice(2,4);
            targetTd.find('input[type=text]').val(targetInput);
        }

        // 書式チェック
        var validTime = /^([0-9]|[0-2][0-9]|3[0-5]):([0-5][0-9])$/;
        if (targetInput && !targetInput.match(validTime)) {
            targetTd.find('.timeError').text('*3');
            var formatError = $('#formatError').val();
            $('#timeFormatError').text('*3　' + formatError);
            return false;
        }

        targetTd.find('.timeError').empty();
        var exist = false;
        $('.timeError').each(function(i, element) {
            if ($(element).text() == '*3') {
                exist = true;
            }
        });
        if (!exist) {
            $('#timeFormatError').empty();
        }
        return true;
    };
    $('.noCalc').focusout(timeFormatCheck);

    // 時間計算
    var beforeVal = null;
    var cwTimeCalculate = function(e) {
        var targetElement = e.target;
        if (beforeVal === targetElement.value) {
            beforeVal = null;
            return false;
        }

        // 入力の書式チェック
        if (targetElement.getAttribute('type') === 'text') {
            if (!timeFormatCheck(e)) {
                return false;
            }

            // チェック結果が問題なく、且つテキストの場合、先頭の0を消す
            var targetVal = targetElement.value;
            if (targetVal.slice(0, 1) === '0' && targetVal.length === 5) {
                // [01:11]などを[1:11]にする
                targetElement.value = targetVal.slice(1);
            }
        }

        var parent = $(targetElement).closest('tr');
        var targetTd = $(targetElement).closest('td');

        var ofcTime = parent.find('.ofcTime').val(); // 出勤
        var levTime = parent.find('.levTime').val(); // 退出
        var out1Time = parent.find('.out1Time').val(); // 外出１
        var in1Time = parent.find('.in1Time').val(); // 再入１
        var out2Time = parent.find('.out2Time').val(); // 外出２
        var in2Time = parent.find('.in2Time').val(); // 再入２

        // 大小関係チェック
        var ofcTimeTd = targetTd.find('.ofcTime').val(); // 出勤
        var levTimeTd = targetTd.find('.levTime').val(); // 退出
        var out1TimeTd = targetTd.find('.out1Time').val(); // 外出１
        var in1TimeTd = targetTd.find('.in1Time').val(); // 再入１
        var out2TimeTd = targetTd.find('.out2Time').val(); // 外出２
        var in2TimeTd = targetTd.find('.in2Time').val(); // 再入２

        var validTime = /^([0-9]|[0-2][0-9]|3[0-5]):([0-5][0-9])$/;

        // 大小関係チェック「出勤・退出」
        if (ofcTime.match(validTime) && levTime.match(validTime)) {
            if ((ofcTimeTd && ofcTimeTd.match(validTime)) || (levTimeTd && levTimeTd.match(validTime))) {
                if (parseInt(ofcTime.replace(":", "")) > parseInt(levTime.replace(":", ""))) {
                    targetTd.find('.timeError').text('*4');
                    var dataSizeError = $('#dataSizeError').val();
                    $('#sizeError').text('*4　' + dataSizeError);
                    return false;
                } else {
                    parent.find('.ofcTime').closest('td').find('.timeError').empty();
                    parent.find('.levTime').closest('td').find('.timeError').empty();
                    var exist = false;
                    $('.timeError').each(function(i, element) {
                        if ($(element).text() == '*4') {
                            exist = true;
                        }
                    });
                    if (!exist) {
                        $('#sizeError').empty();
                    }
                }
            }
        }

        // 大小関係チェック「外出１・再入１」
        if (out1Time.match(validTime) && in1Time.match(validTime)) {
            if ((out1TimeTd && out1TimeTd.match(validTime)) || (in1TimeTd && in1TimeTd.match(validTime))) {
                if (parseInt(out1Time.replace(":", "")) > parseInt(in1Time.replace(":", ""))) {
                    targetTd.find('.timeError').text('*4');
                    var dataSizeError = $('#dataSizeError').val();
                    $('#sizeError').text('*4　' + dataSizeError);
                    return false;
                } else {
                    parent.find('.out1Time').closest('td').find('.timeError').empty();
                    parent.find('.in1Time').closest('td').find('.timeError').empty();
                    var exist = false;
                    $('.timeError').each(function(i, element) {
                        if ($(element).text() == '*4') {
                            exist = true;
                        }
                    });
                    if (!exist) {
                        $('#sizeError').empty();
                    }
                }
            }
        }

        // 大小関係チェック「外出２・再入２」
        if ((out2TimeTd && out2TimeTd.match(validTime)) || (in2TimeTd && in2TimeTd.match(validTime))) {
            if (parseInt(out2Time.replace(":", "")) > parseInt(in2Time.replace(":", ""))) {
                targetTd.find('.timeError').text('*4');
                var dataSizeError = $('#dataSizeError').val();
                $('#sizeError').text('*4　' + dataSizeError);
                return false;
            } else {
                parent.find('.out2Time').closest('td').find('.timeError').empty();
                parent.find('.in2Time').closest('td').find('.timeError').empty();
                var exist = false;
                $('.timeError').each(function(i, element) {
                    if ($(element).text() == '*4') {
                        exist = true;
                    }
                });
                if (!exist) {
                    $('#sizeError').empty();
                }
            }
        }

        // 同行に不正な入力があれば時間計算をしない
        var errExists = false;
        $(targetElement).closest('tr').find("span.calcGuard").each(function(i, element) {
            if ($(element).text()) {
                errExists = true;
            }
        });
        if (errExists) {
            return false;
        }

        // 時間計算に使わない項目はエラー削除
        $(targetElement).closest('tr').find("span.timeError:not(calcGuard)").each(function(i, element) {
            $(element).text('');
        });

        if ($('#txtEmpCd').val()) {
            var empCd = $('#txtEmpCd').val();
            var calDate = parent.find('.calDate').val();
        }
        if (parent.find('.txtEmpCd').text()) {
            var empCd = parent.find('.txtEmpCd').text();
            var calDate = $('#YearMonth').val().replace(/日/, "").replace(/[^0-9]/g, "-");
        }
        var elementWhenFocusout = e.relatedTarget;
        ajaxWithLoading({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: $("#timeCalUrl").val() + '/' + empCd,
            type: 'POST',
            context: parent,
            data: {
                'EMP_CD': empCd,
                'CALD_DATE': calDate,
                'WORKPTN_CD': parent.find('.workPtnCd').val(),
                'REASON_CD': parent.find('.reasonCd').val(),
                'OFC_TIME': parent.find('.ofcTime').val(),
                'LEV_TIME': parent.find('.levTime').val(),
                'OUT1_TIME': parent.find('.out1Time').val(),
                'IN1_TIME': parent.find('.in1Time').val(),
                'OUT2_TIME': parent.find('.out2Time').val(),
                'IN2_TIME': parent.find('.in2Time').val(),
            }
        }).done(function(data) {
            this.find($('.workPtnCd')).val(data.WORKPTN_CD);
            this.find($('.reasonCd')).val(data.REASON_CD);
            this.find($('.ofcTime')).val(data.OFC_TIME_HH === '' ? '' : data.OFC_TIME_HH + ':' + String(data.OFC_TIME_MI).padStart(2, '0'));
            this.find($('.levTime')).val(data.LEV_TIME_HH === '' ? '' : data.LEV_TIME_HH + ':' + String(data.LEV_TIME_MI).padStart(2, '0'));
            this.find($('.out1Time')).val(data.OUT1_TIME_HH === '' ? '' : data.OUT1_TIME_HH + ':' + String(data.OUT1_TIME_MI).padStart(2, '0'));
            this.find($('.in1Time')).val(data.IN1_TIME_HH === '' ? '' : data.IN1_TIME_HH + ':' + String(data.IN1_TIME_MI).padStart(2, '0'));
            this.find($('.out2Time')).val(data.OUT2_TIME_HH === '' ? '' : data.OUT2_TIME_HH + ':' + String(data.OUT2_TIME_MI).padStart(2, '0'));
            this.find($('.in2Time')).val(data.IN2_TIME_HH === '' ? '' : data.IN2_TIME_HH + ':' + String(data.IN2_TIME_MI).padStart(2, '0'));
            this.find($('.workTime')).val(!data.WORK_TIME_HH && !data.WORK_TIME_MI ? '' : data.WORK_TIME_HH + ':' + String(data.WORK_TIME_MI).padStart(2, '0'));
            this.find($('.tardTime')).val(!data.TARD_TIME_HH && !data.TARD_TIME_MI ? '' : data.TARD_TIME_HH + ':' + String(data.TARD_TIME_MI).padStart(2, '0'));
            this.find($('.leaveTime')).val(!data.LEAVE_TIME_HH && !data.LEAVE_TIME_MI ? '' : data.LEAVE_TIME_HH + ':' + String(data.LEAVE_TIME_MI).padStart(2, '0'));
            this.find($('.outTime')).val(!data.OUT_TIME_HH && !data.OUT_TIME_MI ? '' : data.OUT_TIME_HH + ':' + String(data.OUT_TIME_MI).padStart(2, '0'));
            this.find($('.ovtm1Time')).val(!data.OVTM1_TIME_HH && !data.OVTM1_TIME_MI ? '' : data.OVTM1_TIME_HH + ':' + String(data.OVTM1_TIME_MI).padStart(2, '0'));
            this.find($('.ovtm2Time')).val(!data.OVTM2_TIME_HH && !data.OVTM2_TIME_MI ? '' : data.OVTM2_TIME_HH + ':' + String(data.OVTM2_TIME_MI).padStart(2, '0'));
            this.find($('.ovtm3Time')).val(!data.OVTM3_TIME_HH && !data.OVTM3_TIME_MI ? '' : data.OVTM3_TIME_HH + ':' + String(data.OVTM3_TIME_MI).padStart(2, '0'));
            this.find($('.ovtm4Time')).val(!data.OVTM4_TIME_HH && !data.OVTM4_TIME_MI ? '' : data.OVTM4_TIME_HH + ':' + String(data.OVTM4_TIME_MI).padStart(2, '0'));
            this.find($('.ovtm5Time')).val(!data.OVTM5_TIME_HH && !data.OVTM5_TIME_MI ? '' : data.OVTM5_TIME_HH + ':' + String(data.OVTM5_TIME_MI).padStart(2, '0'));
            this.find($('.ovtm6Time')).val(!data.OVTM6_TIME_HH && !data.OVTM6_TIME_MI ? '' : data.OVTM6_TIME_HH + ':' + String(data.OVTM6_TIME_MI).padStart(2, '0'));
            this.find($('.ext1Time')).val(!data.EXT1_TIME_HH && !data.EXT1_TIME_MI ? '' : data.EXT1_TIME_HH + ':' + String(data.EXT1_TIME_MI).padStart(2, '0'));
            this.find($('.ext2Time')).val(!data.EXT2_TIME_HH && !data.EXT2_TIME_MI ? '' : data.EXT2_TIME_HH + ':' + String(data.EXT2_TIME_MI).padStart(2, '0'));
            this.find($('.ext3Time')).val(!data.EXT3_TIME_HH && !data.EXT3_TIME_MI ? '' : data.EXT3_TIME_HH + ':' + String(data.EXT3_TIME_MI).padStart(2, '0'));

            // 出勤色付け「未打刻・二重打刻」
            if (data.OFC_CNT >= 2 && !ofcTime) {
                this.find($('.ofcTime')).css('background-color', 'lightskyblue');
            } else if (!ofcTime && levTime) {
                this.find($('.ofcTime')).css('background-color', 'tomato');
            } else {
                this.find($('.ofcTime')).css('background-color', '');
            }

            // 退出色付け「未打刻・二重打刻」
            if (data.LEV_CNT >= 2 && !levTime) {
                this.find($('.levTime')).css('background-color', 'lightskyblue');
            } else if (ofcTime && !levTime) {
                this.find($('.levTime')).css('background-color', 'tomato');
            } else {
                this.find($('.levTime')).css('background-color', '');
            }

            // 外出１色付け「未打刻・二重打刻」
            if (data.OUT1_CNT >= 2 && !out1Time) {
                this.find($('.out1Time')).css('background-color', 'lightskyblue');
            } else if (!out1Time && in1Time) {
                this.find($('.out1Time')).css('background-color', 'tomato');
            } else {
                this.find($('.out1Time')).css('background-color', '');
            }

            // 再入１色付け「未打刻・二重打刻」
            if (data.IN1_CNT >= 2 && !in1Time) {
                this.find($('.in1Time')).css('background-color', 'lightskyblue');
            } else if (out1Time && !in1Time) {
                this.find($('.in1Time')).css('background-color', 'tomato');
            } else {
                this.find($('.in1Time')).css('background-color', '');
            }

            // 外出２色付け「未打刻・二重打刻」
            if (data.OUT2_CNT >= 2 && !out2Time) {
                this.find($('.out2Time')).css('background-color', 'lightskyblue');
            } else if (!out2Time && in2Time) {
                this.find($('.out2Time')).css('background-color', 'tomato');
            } else {
                this.find($('.out2Time')).css('background-color', '');
            }

            // 再入２色付け「未打刻・二重打刻」
            if (data.IN2_CNT >= 2 && !in2Time) {
                this.find($('.in2Time')).css('background-color', 'lightskyblue');
            } else if (out2Time && !in2Time) {
                this.find($('.in2Time')).css('background-color', 'tomato');
            } else {
                this.find($('.in2Time')).css('background-color', '');
            }

            var exist1 = false;
            var exist2 = false;
            $('.timeError').each(function(i, element) {
                if ($(element).text() == '*3') {
                    exist1 = true;
                }
                if ($(element).text() == '*4') {
                    exist2 = true;
                }
            });
            if (!exist1) {
                $('#timeFormatError').empty();
            }
            if (!exist2) {
                $('#sizeError').empty();
            }
            if (elementWhenFocusout && elementWhenFocusout.getAttribute('type') === 'button') {
                var clickFunc = function(target){
                    target.click();
                };
                setTimeout(clickFunc, 10, elementWhenFocusout);
            }
        }).fail(function(data) {
            console.log(data);
        });
    };
    $('.workPtnCd, .reasonCd, .ofcTime, .levTime, .out1Time, .in1Time, .out2Time, .in2Time').focusout(cwTimeCalculate);

    var setBeforeValue = function(e) {
        beforeVal = e.target.value;
    }
    $('.workPtnCd, .reasonCd, .ofcTime, .levTime, .out1Time, .in1Time, .out2Time, .in2Time').focusin(setBeforeValue);
})
