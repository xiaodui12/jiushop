eval(function(p,a,c,k,e,d){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--){d[e(c)]=k[c]||e(c)}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('3v([\'M\',\'14\'],c(M,14){4 10={};10.2q=c(){6(1c(7.p)!==\'12\'){4 8=$(".3-8[9-o=\'"+7.p.b+"\']");6(8.L<=\'0\'){4 1n=$(".3-8");6(1n.L>\'0\'){4 5=14(\'1C\',{3:7.p});$(1n).1n().2r(5)}x{7.p.E=1;4 5=14(\'1C\',{3:7.p});$(\'.1i-28\').1J();$(\'.k-1i\').5(5)}}x{4 3=7.p;8.v(\'.h\').5(3.h);8.v(\'.g\').5(3.g);8.v(\'.3\').5(3.n.20(/ /1Z,\'\')+\' \'+3.3)}15 7.p}$(\'*[9-29=15]\').2s(\'R\').R(c(){4 8=$(j).11(\'.3-8\');4 b=8.9(\'o\');6(!b){b=$(j).9("o");4 i=b}B.2t(\'删除后无法恢复, 确认要删除吗 ?\',c(){M.D(\'P/3/15\',{b:b},c(y){6(y.1g==1){6(y.f.26){$("[9-o=\'"+y.f.26+"\']").v(\':19\').1W(\'1k\',z)}8.24();2x(c(){6($(".3-8").L<=0){$(\'.1i-28\').u()}},2C);A}B.C.u(y.f.1N)},z,z);6(b==i){7.T.16()}})});$(t).1w(\'R\',\'[9-29=2a]\',c(){4 8=$(j).11(\'.3-8\');4 b=8.9(\'o\');6(!b){b=$(j).9("o")}M.D(\'P/3/2a\',{b:b},c(y){6(y.1g==1){$(\'.k-1i\').21(8);B.C.u("设置默认地址成功");A}B.C.u(y.f.1N)},z,z)})};10.2I=c(K){4 1M=[\'1s.2c\'];4 Y=1v.1t.U(\'?\').2f().U(\'&\');6(K.18){1M=[\'1s.2c\',\'1s.2L\']}2P(1M,c(){$(\'#n\').1u({1a:\'请选择所在城市\',18:K.18,1r:K.1r,2O:c(2o){4 V=$(\'#n\').Z(\'9-O\');4 X=V.U(\' \');6(K.18&&K.1r){4 F=X[1];4 J=X[2];F=F+\'\';J=J+\'\';4 9=1y(F,J);4 e=$(\'<1F 1e="1z" b="e"  1E="e" 9-O="" O="" 2D="所在街道"  s="k-1F" 2w=""/>\');4 2g=$(\'#e\').11(\'.k-2u-2G\');$(\'#e\').24();2g.2z(e);e.1u({1a:\'请选择所在街道\',e:1,9:9})}}});6(K.18&&K.1r){4 V=$(\'#n\').Z(\'9-O\');6(V){4 X=V.U(\' \');4 F=X[1];4 J=X[2];4 9=1y(F,J);$(\'#e\').1u({1a:\'请选择所在街道\',e:1,9:9})}}});$(t).1w(\'R\',\'#1m-3\',c(){1Q.2v(c(){1Q.2K({2E:c(Q){4 W={1l:1,h:Q.2N,g:Q.2J,3:Q.2H,2k:Q.2F,2m:Q.2B,1H:Q.2p,};6(Y.1h(\'r=P.3.G\')!=-1){W.1e=\'G\'}1v.2h=M.2A(\'P/3/2y\',W)}})})});$(t).1w(\'R\',\'#1m-S\',c(){4 Y=1v.1t.U(\'?\').2f().U(\'&\');6($(j).Z(\'S\')){A}6($(\'#h\').1p()){B.C.u("请填写收件人");A}4 1O=/(境外地区)+/.1o($(\'#n\').l());4 1P=/(台湾)+/.1o($(\'#n\').l());4 1S=/(澳门)+/.1o($(\'#n\').l());4 1U=/(香港)+/.1o($(\'#n\').l());6(1O||1P||1S||1U){6($(\'#g\').1p()){B.C.u("请填写手机号码");A}}x{6(!$(\'#g\').2R()){B.C.u("请填写正确手机号码");A}}6($(\'#n\').1p()){B.C.u("请填写所在地区");A}6($(\'#3\').1p()){B.C.u("请填写详细地址");A}$(\'#1m-S\').5(\'正在处理...\').Z(\'S\',1);7.p={h:$(\'#h\').l(),g:$(\'#g\').l(),3:$(\'#3\').l(),n:$(\'#n\').l(),e:$(\'#e\').l(),32:$(\'#e\').Z(\'9-O\'),V:$(\'#n\').Z(\'9-O\'),E:$(\'#E\').3h(\':1k\')?1:0};4 W={b:$(\'#o\').l(),3i:7.p};6(Y.1h(\'1l=1\')){W.1l=1}M.D(\'P/3/S\',W,c(D){$(\'#1m-S\').5(\'保存地址\').3j(\'S\');7.p.b=D.f.o;6(D.1g==1){B.C.u(\'保存成功!\');6(Y.1h(\'1l=1\')!=-1){7.q={\'h\':$(\'#h\').l(),\'3\':$(\'#n\').l()+\' \'+$(\'#3\').l(),\'g\':$(\'#g\').l(),\'b\':D.f.o};t.I="b="+7.q.b;t.I="g="+7.q.g;t.I="h="+1b(7.q.h);t.I="1V="+1b($.1T(7.q.3));6(Y.1h(\'1e=G\')!=-1){T.3k(-2)}x{T.16()}}x{T.16()}}x{B.C.u(D.f.1N)}},z,z)})};10.3l=c(){6(1c(7.p)!==\'12\'){4 3=7.p;4 8=$(".3-8[9-o=\'"+3.b+"\']",$(\'#13-3-G\'));6(8.L>0){8.v(\'.h\').5(3.h);8.v(\'.g\').5(3.g);8.v(\'.3\').5(3.n.20(/ /1Z,\'\')+\' \'+3.3)}x{4 5=14(\'1C\',{3:7.p});$(\'.k-d-2Q\').21(5)}15 7.p}4 17=1L;6(1c(7.q)!==\'12\'){17=7.q.b;15 7.q}x 6(1c(7.1R)!==\'12\'){17=7.1R}6(17){$(".3-8[9-o=\'"+17+"\'] .k-19",$(\'#13-3-G\')).1W(\'1k\',z)}$(\'.3-8 .k-d-1G,.3-8 .k-d-1I\',$(\'#13-3-G\')).R(c(){4 $j=$(j).11(\'.3-8\');7.q={\'h\':$j.v(\'.h\').5(),\'3\':$j.v(\'.3\').5(),\'g\':$j.v(\'.g\').5(),\'b\':$j.9(\'o\')};t.I="b="+7.q.b;t.I="g="+7.q.g;t.I="h="+1b(7.q.h);t.I="1V="+1b($.1T(7.q.3));T.16()});$(\'#1t\',$(\'#13-3-G\')).3o(c(){M.D(\'P/3/3f\',{3p:$(j).l()},c(y){6(y.1g==1){4 f=y.f;$(\'#2b\').1J();$(\'#1A\').u();4 5="";1K(4 i=0;i<f.d.L;i++){4 E=f.d[i].E;5+=\'<w  s="k-d 3-8"  9-E="\'+E+\'"  9-o="\'+f.d[i].b+\'">\';5+=\'<w s="k-d-1G">\';5+=\'<1F 1e="19" 1E="3r" s="k-19  k-19-3s" \';6(2i(E)>0){5+=\' 1k \'}5+=\' /></w>\';5+=\'<w s="k-d-1I">\';5+=\'<w s="1a"><H s="h">\'+f.d[i].h+\'</H> <H s="g">\'+f.d[i].g+\'</H></w>\';5+=\'<w s="1z">\';5+=\'<H s="3">\';6(2i(E)>0){5+=\' <H s="3t">默认</H> \'}4 e=" ";6(f.d[i].e!=12){e+=f.d[i].e+\' \'}5+=f.d[i].2k+f.d[i].2m+f.d[i].1H+e+f.d[i].3;5+=\'</H>\';5+=\'</w>\';5+=\'</w>\';5+=\'<a  2h="\'+f.d[i].3u+\'" s="3n" 9-3e="z">\';5+=\'<w s="k-d-3d">\';5+=\'<i s="2e 2e-2T"></i>\';5+=\'</w>\';5+=\'</a>\';5+=\'</w>\'}$(\'#1A\').5(5);$(\'.3-8 .k-d-1G,.3-8 .k-d-1I\',$(\'#13-3-G\')).R(c(){4 $j=$(j).11(\'.3-8\');7.q={\'h\':$j.v(\'.h\').5(),\'3\':$j.v(\'.3\').5(),\'g\':$j.v(\'.g\').5(),\'b\':$j.9(\'o\')};T.16()})}x{$(\'#2b\').u();$(\'#1A\').1J()}},z,z)})};10.31=c(){M.D(\'P/3/G/36\',{},c(){})};7.2n=c(1q){4 N=1x;6(7.25){N=27 25("37.38");N.39=1L;N.3a(1q)||N.3b(1q)}x 6(t.22&&t.22.3m){4 1j=27 7.35();1j.34("33",1q,1L);1j.2S(1x);N=1j.30}x{N=1x}A N};7.1y=c(F,J){4 2d=F.2Z(0,2);4 2l=\'../2Y/2X/2W/2V/2U/1H/d/\'+2d+\'/\'+F+\'.3c\';4 2j=2n(2l);4 1d=2j.3q[0].1X("1f");4 9=[];6(1d.L>0){1K(4 i=0;i<1d.L;i++){4 1f=1d[i];4 1Y=1f.1D("23");6(1Y==J){4 1B=1f.1X("e");1K(4 m=0;m<1B.L;m++){4 e=1B[m];9.3g({"1z":e.1D(\'1E\'),"O":e.1D(\'23\'),"2M":[]})}}}}A 9};A 10});',62,218,'|||address|var|html|if|window|item|data||id|function|list|street|result|mobile|realname||this|fui|val||areas|addressid|editAddressData|selectedAddressData||class|document|show|find|div|else|ret|true|return|FoxUI|toast|json|isdefault|city_code|selector|span|cookie|area_code|params|length|core|xmlDom|value|member|res|click|submit|history|split|datavalue|obj|codes|queryArr|attr|modal|closest|undefined|page|tpl|delete|back|selectedAddressID|new_area|radio|title|encodeURI|typeof|CityList|type|county|status|indexOf|content|xmlhttp|checked|is_from_wx|btn|first|test|isEmpty|xmlFile|address_street|foxui|search|cityPicker|location|on|null|loadStreetData|text|addresslist|streetlist|tpl_address_item|getAttribute|name|input|media|area|inner|hide|for|false|reqParams|message|jingwai|taiwan|wx|orderSelectedAddressID|aomen|trim|xianggang|addressd|prop|getElementsByTagName|county_code|ig|replace|prepend|implementation|code|remove|ActiveXObject|defaultid|new|empty|toggle|setdefault|noaddress|picker|left|icon|pop|parents|href|parseInt|xmlCityDoc|province|xmlUrl|city|loadXmlFile|self|countryName|initList|before|unbind|confirm|cell|ready|readonly|setTimeout|post|append|getUrl|cityName|100|placeholder|success|provinceName|info|detailInfo|initPost|telNumber|openAddress|citydatanew|children|userName|onClose|require|group|isMobile|send|icon_huida_tianxiebtn|dist|js|static|ewei_shopv2|addons|substring|responseXML|loadSelectorData|streetdatavalue|GET|open|XMLHttpRequest|get_list|Microsoft|XMLDOM|async|load|loadXML|xml|angle|nocache|getselector|push|is|addressdata|removeAttr|go|initSelector|createDocument|external|change|keywords|childNodes|selected|danger|tacitlyapprove|editurl|define'.split('|'),0,{}))
