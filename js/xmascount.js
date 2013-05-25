function christmaspress_xmascount() {today = new Date();
thismon = today.getMonth();
thisday = today.getDate();
thisyr = today.getFullYear();
if (thismon == 11 && thisday > 25)
	{
	thisyr = +thisyr;
	BigDay = new Date("December 25, "+thisyr);
	}
else
	{
	BigDay = new Date("December 25, "+thisyr);
	}

msPerDay = 24 * 60 * 60 * 1000 ;
timeLeft = (BigDay.getTime() - today.getTime());
e_daysLeft = timeLeft / msPerDay;
daysLeft = Math.floor(e_daysLeft);
e_hrsLeft = (e_daysLeft - daysLeft)*24;
hrsLeft = Math.floor(e_hrsLeft);
minsLeft = Math.floor((e_hrsLeft - hrsLeft)*60);
if (daysLeft <= 0 )
{ 
document.write("<br><br>Merry<br>Christmas!")
}
else 
{
    document.write("Only<BR> " + daysLeft + " days <BR> until<BR>Christmas!");
}
}