const s=document.getElementById("admins-tab"),c=document.getElementById("teamleads-tab"),i=document.getElementById("webs-tab"),o=document.getElementById("stats-tab");let d=0;function t(){d++,d>=100&&(alert("Stoppppp!!!!"),d=0)}function n(e,r){e=document.getElementById(e),e.innerHTML=r}s==null||s.addEventListener("click",function(){t(),fetch("/users?role=admin").then(e=>e.json()).then(e=>{n("admins",`JSON: ${JSON.stringify(e.users)}`)})});c==null||c.addEventListener("click",function(){t(),fetch("/users?role=teamlead").then(e=>e.json()).then(e=>{n("teamleads",`JSON: ${JSON.stringify(e.users)}`)})});i==null||i.addEventListener("click",function(){t(),fetch("/users?role=web").then(e=>e.json()).then(e=>{n("webs",`JSON: ${JSON.stringify(e.users)}`)})});o==null||o.addEventListener("click",function(){t(),fetch("/stats").then(e=>e.json()).then(e=>{n("stats",`JSON: ${JSON.stringify(e.stats)}`)})});
