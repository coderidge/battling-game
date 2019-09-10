# Battling 

Play a command line battle game.

#Combatant	Types	
There	are	3	types	of	combatant:	swordsman,	brute	and	grappler.	Each	type	has	
strengths	and	weaknesses.	At	the	start	of	a	battle,	when	combatants	are	created,	every	
property	must	be	randomly	determined	between	the	maximum	and	minimum	values	
allowed	for	that	type.
	
#Battle/Game	Flow	
The	program	runs	on	the	command	line.		When	the	program	starts,	it	asks	for	the	names	
of	two	combatants	and	assigns	them	a	type	of	battler	at	random.		The	properties	are	
then	determined	randomly	for	each	fighter	as	above.		
The	program	runs	the	battle	simulation	and	outputs	a	line	of	text	each	turn	explaining	
what	happened	that	round	until	either	one	runs	out	of	health	or	30	turns	pass	without	a	
winner	being	declared.	
The	speed	of	the	combatants	determines	which	one	will	attack	first,	if	two	combatants
have	the	same	speed	the	one	with	the	lower	defense	should	go	first.	The	combatants	
then	attack	one	at	a	time	until	the	end	of	the	battle.	The	damage	dealt	by	the	attacker	is	
determined	with	the	following	calculation:	
Damage	=	Attacker	strength	– Defenders	Defense	
The	damage	is	subtracted	from	the	defenders	health.	If	a	fighter’s	health	drops	to	0	they	
lose	the	fight.	If	the	fight	has	not	finished	after	30	rounds	a	draw	is	declared.	
Every	time	a	defender	is	attacked	there	is	a	small	chance	the	attacker	misses.	The	
chance	of	an	attack	missing	is	denoted	by	the	defenders	luck	property.		
		
Special	Skills	
Each	type	of	battler	has	a	special	skill:	
Swordsman	– Lucky	Strike	
With	each	attack	there	is	a	5%	chance	of	their	strength	doubling	for	that	attack.	
Brute	– Stunning	blow	
With	each	attack	there	is	a	2%	chance	of	stunning	the	enemy,	causing	them	to	miss	their	
next	attack.	
Grappler	– Counter	Attack	
When	a	grappler	evades	an	attack	their	opponent	is	dealt	10	damage.	
		
When	a	battle	ends,	the	program	should	declare	the	winner	by	name,	or	announce	the	
result	as	a	draw.	

#How to Play 

In your command line enter 'php PlayGame.php Playerfirstname Playerlastname' with the a space between each name

# Run Tests 

cd to test folder run 'phpunit CombatTest.php'  