(function(j,B){var C="abbr|article|aside|audio|canvas|details|figcaption|figure|footer|header|hgroup|mark|meter|nav|output|progress|section|summary|time|video";function e(f){for(var c=-1;++c<d;){f.createElement(w[c])}}function b(k,f){for(var i=-1,c=k.length,g,h=[];++i<c;){g=k[i];if((f=g.media||f)!="screen"){h.push(b(g.imports,f),g.cssText)}}return h.join("")}var y=B.createElement("div");y.innerHTML="<z>i</z>";if(y.childNodes.length!==1){var w=C.split("|"),d=w.length,F=RegExp("(^|\\s)("+C+")","gi"),E=RegExp("<(/*)("+C+")","gi"),D=RegExp("(^|[^\\n]*?\\s)("+C+")([^\\n]*)({[\\n\\w\\W]*?})","gi"),a=B.createDocumentFragment(),v=B.documentElement;y=v.firstChild;var x=B.createElement("body"),q=B.createElement("style"),A;e(B);e(a);y.insertBefore(q,y.firstChild);q.media="print";j.attachEvent("onbeforeprint",function(){var h=-1,f=b(B.styleSheets,"all"),g=[],c;for(A=A||B.body;(c=D.exec(f))!=null;){g.push((c[1]+c[2]+c[3]).replace(F,"$1.iepp_$2")+c[4])}for(q.styleSheet.cssText=g.join("\n");++h<d;){f=B.getElementsByTagName(w[h]);g=f.length;for(c=-1;++c<g;){if(f[c].className.indexOf("iepp_")<0){f[c].className+=" iepp_"+w[h]}}}a.appendChild(A);v.appendChild(x);x.className=A.className;x.innerHTML=A.innerHTML.replace(E,"<$1font")});j.attachEvent("onafterprint",function(){x.innerHTML="";v.removeChild(x);v.appendChild(A);q.styleSheet.cssText=""})}})(this,document);