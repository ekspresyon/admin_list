// https://d3js.org/d3-dsv/ v1.2.0 Copyright 2019 Mike Bostock
!function(r,t){"object"==typeof exports&&"undefined"!=typeof module?t(exports):"function"==typeof define&&define.amd?define(["exports"],t):t((r=r||self).d3=r.d3||{})}(this,function(r){"use strict";var t={},e={},n=34,o=10,a=13;function u(r){return new Function("d","return {"+r.map(function(r,t){return JSON.stringify(r)+": d["+t+'] || ""'}).join(",")+"}")}function f(r){var t=Object.create(null),e=[];return r.forEach(function(r){for(var n in r)n in t||e.push(t[n]=n)}),e}function i(r,t){var e=r+"",n=e.length;return n<t?new Array(t-n+1).join(0)+e:e}function s(r){var t,e=r.getUTCHours(),n=r.getUTCMinutes(),o=r.getUTCSeconds(),a=r.getUTCMilliseconds();return isNaN(r)?"Invalid Date":((t=r.getUTCFullYear())<0?"-"+i(-t,6):t>9999?"+"+i(t,6):i(t,4))+"-"+i(r.getUTCMonth()+1,2)+"-"+i(r.getUTCDate(),2)+(a?"T"+i(e,2)+":"+i(n,2)+":"+i(o,2)+"."+i(a,3)+"Z":o?"T"+i(e,2)+":"+i(n,2)+":"+i(o,2)+"Z":n||e?"T"+i(e,2)+":"+i(n,2)+"Z":"")}function c(r){var i=new RegExp('["'+r+"\n\r]"),c=r.charCodeAt(0);function l(r,u){var f,i=[],s=r.length,l=0,d=0,m=s<=0,v=!1;function p(){if(m)return e;if(v)return v=!1,t;var u,f,i=l;if(r.charCodeAt(i)===n){for(;l++<s&&r.charCodeAt(l)!==n||r.charCodeAt(++l)===n;);return(u=l)>=s?m=!0:(f=r.charCodeAt(l++))===o?v=!0:f===a&&(v=!0,r.charCodeAt(l)===o&&++l),r.slice(i+1,u-1).replace(/""/g,'"')}for(;l<s;){if((f=r.charCodeAt(u=l++))===o)v=!0;else if(f===a)v=!0,r.charCodeAt(l)===o&&++l;else if(f!==c)continue;return r.slice(i,u)}return m=!0,r.slice(i,s)}for(r.charCodeAt(s-1)===o&&--s,r.charCodeAt(s-1)===a&&--s;(f=p())!==e;){for(var w=[];f!==t&&f!==e;)w.push(f),f=p();u&&null==(w=u(w,d++))||i.push(w)}return i}function d(t,e){return t.map(function(t){return e.map(function(r){return v(t[r])}).join(r)})}function m(t){return t.map(v).join(r)}function v(r){return null==r?"":r instanceof Date?s(r):i.test(r+="")?'"'+r.replace(/"/g,'""')+'"':r}return{parse:function(r,t){var e,n,o=l(r,function(r,o){if(e)return e(r,o-1);n=r,e=t?function(r,t){var e=u(r);return function(n,o){return t(e(n),o,r)}}(r,t):u(r)});return o.columns=n||[],o},parseRows:l,format:function(t,e){return null==e&&(e=f(t)),[e.map(v).join(r)].concat(d(t,e)).join("\n")},formatBody:function(r,t){return null==t&&(t=f(r)),d(r,t).join("\n")},formatRows:function(r){return r.map(m).join("\n")},formatRow:m,formatValue:v}}var l=c(","),d=l.parse,m=l.parseRows,v=l.format,p=l.formatBody,w=l.formatRows,h=l.formatRow,C=l.formatValue,g=c("\t"),R=g.parse,T=g.parseRows,F=g.format,y=g.formatBody,j=g.formatRows,A=g.formatRow,N=g.formatValue;var U=new Date("2019-01-01T00:00").getHours()||new Date("2019-07-01T00:00").getHours();r.autoType=function(r){for(var t in r){var e,n,o=r[t].trim();if(o)if("true"===o)o=!0;else if("false"===o)o=!1;else if("NaN"===o)o=NaN;else if(isNaN(e=+o)){if(!(n=o.match(/^([-+]\d{2})?\d{4}(-\d{2}(-\d{2})?)?(T\d{2}:\d{2}(:\d{2}(\.\d{3})?)?(Z|[-+]\d{2}:\d{2})?)?$/)))continue;U&&n[4]&&!n[7]&&(o=o.replace(/-/g,"/").replace(/T/," ")),o=new Date(o)}else o=e;else o=null;r[t]=o}return r},r.csvFormat=v,r.csvFormatBody=p,r.csvFormatRow=h,r.csvFormatRows=w,r.csvFormatValue=C,r.csvParse=d,r.csvParseRows=m,r.dsvFormat=c,r.tsvFormat=F,r.tsvFormatBody=y,r.tsvFormatRow=A,r.tsvFormatRows=j,r.tsvFormatValue=N,r.tsvParse=R,r.tsvParseRows=T,Object.defineProperty(r,"__esModule",{value:!0})});

