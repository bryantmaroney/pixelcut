<?php include('../../includes/header.php');?>

<div class="dash-left">
	<div class="dash-logoarea">
		<div class="dash-logo"></div>
	</div>
	<ul class="dash-sidebarlist">
		<li class="active">
			<span class="listicon"></span> Content
		</li>
		<li>
			<span class="projecticon"></span> Projects
		</li>
		<li>
			<span class="usericon"></span> Users
		</li>
	</ul>
</div>
<div class="dash-right">
	<div class="dash-header">
		<div class="dash-header-arrow"></div>
		<div class="dash-header-title">Team Member Dashboard</div>
		<div class="dash-header-usericon">
			<img src="../../images/usericon.jpg">
		</div>
	</div>
	<div class="dash-contentarea">
		<div class="dash-contentarea-wrapper">
			<div class="dash-page-title">Add Content</div>
			
			<form><!-- start form -->
			
				<div class="team-addcontent-requestbutton">REQUEST TOPIC APPROVAL</div>
				<div class="team-addcontent-discardbutton">DISCARD</div>
				
				<div class="team-addcontent-titlebox">
					<div>
						<label>TITLE*</label>
						<input class="addcontent-titlefield">
					</div>	
					<div>
						<label>PROJECT*</label>
						<select class="addcontent-projectdrop">
							<option value="volvo">Volvo</option>
							<option value="saab">Saab</option>
							<option value="mercedes">Mercedes</option>
							<option value="audi">Audi</option>
						</select>
					</div>
					<div>	
						<label>STATUS*</label>
						<select class="addcontent-statusdrop">
							<option value="volvo">Volvo</option>
							<option value="saab">Saab</option>
							<option value="mercedes">Mercedes</option>
							<option value="audi">Audi</option>
						</select>
					</div>	
					<div>
						<label>MINIMUM WORD COUNT*</label>
						<input class="addcontent-wordcount">
					</div>	
				</div>
				<div class="team-addcontent-typebox">
					<div class="team-addcontent-typetitle">CONTENT TYPE*</div>
					
					<div>					
						<input type="radio" name="radiog_lite" id="radio1" class="css-checkbox" />
		               <label for="radio1" class="css-label radGroup1"></label>
		               <div class="typebox-radiotitle">Standard Blog Post</div>
					</div>	
					<div>
						<input type="radio" name="radiog_lite" id="radio2" class="css-checkbox" />
		               <label for="radio2" class="css-label radGroup2"></label>
		               <div class="typebox-radiotitle">Product Page</div>
					</div>
					<div>
						<input type="radio" name="radiog_lite" id="radio3" class="css-checkbox" />
		               <label for="radio3" class="css-label radGroup3"></label>
		               <div class="typebox-radiotitle">Product Category Page</div>
					</div>
					<div>
						<input type="radio" name="radiog_lite" id="radio4" class="css-checkbox" />
		               <label for="radio4" class="css-label radGroup4"></label>
		               <div class="typebox-radiotitle">Resource/Guide</div>
					</div>
					<div>
						<input type="radio" name="radiog_lite" id="radio5" class="css-checkbox" />
		               <label for="radio5" class="css-label radGroup5"></label>
		               <div class="typebox-radiotitle">Service Landing Page</div>
					</div>
					<div>
						<input type="radio" name="radiog_lite" id="radio6" class="css-checkbox" />
		               <label for="radio6" class="css-label radGroup6"></label>
		               <div class="typebox-radiotitle">Sales Page</div>
					</div>
					<div>
						<input type="radio" name="radiog_lite" id="radio7" class="css-checkbox" />
		               <label for="radio7" class="css-label radGroup7"></label>
		               <div class="typebox-radiotitle">Whitepaper</div>
					</div>
					<div>
						<input type="radio" name="radiog_lite" id="radio8" class="css-checkbox" />
		               <label for="radio8" class="css-label radGroup8"></label>
		               <div class="typebox-radiotitle">Wiki Article</div>
					</div>
					<div>
						<input type="radio" name="radiog_lite" id="radio9" class="css-checkbox" />
		               <label for="radio9" class="css-label radGroup9"></label>
		               <div class="typebox-radiotitle">Infographic</div>
					</div>
					<div>
						<input type="radio" name="radiog_lite" id="radio10" class="css-checkbox" />
		               <label for="radio10" class="css-label radGroup10"></label>
		               <div class="typebox-radiotitle">Something Else</div>
					</div>
				</div>
				
				<div class="team-addcontent-keywordsbox">
					<div class="team-addcontent-leftkeywords">
						<div>
							<label>CONTENT TACTIC</label>
							<select>
								<option value="volvo">Volvo</option>
								<option value="saab">Saab</option>
								<option value="mercedes">Mercedes</option>
								<option value="audi">Audi</option>
							</select>
						</div>
						<div>
							<label>TARGET KEYWORD</label>
							<input type="text">
						</div>
					</div>
					<div class="team-addcontent-rightkeywords">
						<div>
							<label>FRAMING KEYWORDS</label>
							<textarea name="tags2" class="textarea"></textarea>
						</div>
					</div>
				</div>
				
				<div class="team-addcontent-publish">
					<div>
						<label>PLANNED PUBLISH DATE</label>
						<input id="publishdate" type="text" placeholder="Select a date">
						<span></span>
					</div>
					<div>
						<label>TARGET WRITTEN-BY DATE</label>
						<input id="targetdate" type="text" placeholder="Select a date">
						<span></span>
					</div>
				</div>
				
				<div class="team-addcontent-publishpage">
					<div>
						<label>PUBLISH PAGE</label>
						<input type="text" placeholder="/example-location/">
					</div>
					<div>
						<label>WRITER</label>
						<select>
							<option value="" selected data-default>Select a Writer</option>
							<option value="volvo">Volvo</option>
							<option value="saab">Saab</option>
							<option value="mercedes">Mercedes</option>
							<option value="audi">Audi</option>
						</select>
						<span></span>
					</div>
				</div>
				
				<div class="team-addcontent-voice">
					<div>
						<label>VOICE</label>
						<textarea></textarea>
					</div>
				</div>
				
				<div class="team-addcontent-notes">
					<div>
						<label>NOTES</label>
						<textarea type="text" placeholder="General notes, internal linking, words to avoice, etc."></textarea>
					</div>
				</div>
				
				<div class="team-addcontent-meta">
					<div>
						<label>META DESCRIPTION</label>
						<div>
							<span id="charNum">0</span>/160 Chars
						</div>
						<textarea type="text" placeholder="Meta description" onkeyup="countChar(this)"></textarea>
					</div>
				</div>
				
				<div class="team-addcontent-persona">
					<div>
						<label>PERSONA</label>
						<select>
							<option value="volvo">Volvo</option>
							<option value="saab">Saab</option>
							<option value="mercedes">Mercedes</option>
							<option value="audi">Audi</option>
						</select>
					</div>
					<div>
						<label>PILLAR</label>
						<select>
							<option value="volvo">Volvo</option>
							<option value="saab">Saab</option>
							<option value="mercedes">Mercedes</option>
							<option value="audi">Audi</option>
						</select>
					</div>
					<div>
						<label>CLUSTER</label>
						<select>
							<option value="volvo">Volvo</option>
							<option value="saab">Saab</option>
							<option value="mercedes">Mercedes</option>
							<option value="audi">Audi</option>
						</select>
					</div>
				</div>
				
				<div class="team-addcontent-bottombuttons">
					<div>
						<input type="submit" value="ASSIGN TO WRITER">
						<input type="submit" value="SAVE AS IDEA">
						<input type="submit" value="REQUEST TOPIC APPROVAL">
						
						<input type="submit" value="DISCARD">
						<input type="submit" value="SAVE CHANGES">
					</div>
				</div>
			
			</form><!-- end form -->	
			
		</div><!-- dash contentarea-wrapper -->
	</div>
</div>

<script>
// IF WRITER, REMOVE BUTTONS
$('.team-addcontent-publishpage div select').change(function(){
	if($(this).val() == ''){	
		$('.team-addcontent-bottombuttons div input:nth-child(1), .team-addcontent-bottombuttons div input:nth-child(2), .team-addcontent-bottombuttons div input:nth-child(3)').show();
		$('.team-addcontent-bottombuttons div input:nth-child(4), .team-addcontent-bottombuttons div input:nth-child(5)').hide();
	} else {
		$('.team-addcontent-bottombuttons div input:nth-child(1), .team-addcontent-bottombuttons div input:nth-child(2), .team-addcontent-bottombuttons div input:nth-child(3)').hide();
		$('.team-addcontent-bottombuttons div input:nth-child(4), .team-addcontent-bottombuttons div input:nth-child(5)').show();
	}
});	
	
// CHARACTER COUNTER
function countChar(val) {
	var len = val.value.length;
	if (len >= 500) {
		val.value = val.value.substring(0, 160);
	} else {
		$('#charNum').text(0 + len);
	}
};
	
// DATE SELECTION
$(function() {
	$('#publishdate, #targetdate').datepicker();
});

// TAGIFY	
new Tagify(document.querySelector('input[name=value_empty_JSON]'))
new Tagify(document.querySelector('input[name=value_JSON]'))
</script>

<script data-name="textarea">
(function(){
var input = document.querySelector('textarea[name=tags2]'),
    tagify = new Tagify(input, {
        backspace        : "edit",
        enforceWhitelist : false,
        whitelist        : ["The Shawshank Redemption", "The Godfather", "The Godfather: Part II", "The Dark Knight", "12 Angry Men", "Schindler's List", "Pulp Fiction", "The Lord of the Rings: The Return of the King", "The Good, the Bad and the Ugly", "Fight Club", "The Lord of the Rings: The Fellowship of the Ring", "Star Wars: Episode V - The Empire Strikes Back", "Forrest Gump", "Inception", "The Lord of the Rings: The Two Towers", "One Flew Over the Cuckoo's Nest", "Goodfellas", "The Matrix", "Seven Samurai", "Star Wars: Episode IV - A New Hope", "City of God", "Se7en", "The Silence of the Lambs", "It's a Wonderful Life", "The Usual Suspects", "Life Is Beautiful", "Léon: The Professional", "Spirited Away", "Saving Private Ryan", "La La Land", "Once Upon a Time in the West", "American History X", "Interstellar", "Casablanca", "Psycho", "City Lights", "The Green Mile", "Raiders of the Lost Ark", "The Intouchables", "Modern Times", "Rear Window", "The Pianist", "The Departed", "Terminator 2: Judgment Day", "Back to the Future", "Whiplash", "Gladiator", "Memento", "Apocalypse Now", "The Prestige", "The Lion King", "Alien", "Dr. Strangelove or: How I Learned to Stop Worrying and Love the Bomb", "Sunset Boulevard", "The Great Dictator", "Cinema Paradiso", "The Lives of Others", "Paths of Glory", "Grave of the Fireflies", "Django Unchained", "The Shining", "WALL·E", "American Beauty", "The Dark Knight Rises", "Princess Mononoke", "Aliens", "Oldboy", "Once Upon a Time in America", "Citizen Kane", "Das Boot", "Witness for the Prosecution", "North by Northwest", "Vertigo", "Star Wars: Episode VI - Return of the Jedi", "Reservoir Dogs", "M", "Braveheart", "Amélie", "Requiem for a Dream", "A Clockwork Orange", "Taxi Driver", "Lawrence of Arabia", "Like Stars on Earth", "Double Indemnity", "To Kill a Mockingbird", "Eternal Sunshine of the Spotless Mind", "Toy Story 3", "Amadeus", "My Father and My Son", "Full Metal Jacket", "The Sting", "2001: A Space Odyssey", "Singin' in the Rain", "Bicycle Thieves", "Toy Story", "Dangal", "The Kid", "Inglourious Basterds", "Snatch", "Monty Python and the Holy Grail", "Hacksaw Ridge", "3 Idiots", "L.A. Confidential", "For a Few Dollars More", "Scarface", "Rashomon", "The Apartment", "The Hunt", "Good Will Hunting", "Indiana Jones and the Last Crusade", "A Separation", "Metropolis", "Yojimbo", "All About Eve", "Batman Begins", "Up", "Some Like It Hot", "The Treasure of the Sierra Madre", "Unforgiven", "Downfall", "Raging Bull", "The Third Man", "Die Hard", "Children of Heaven", "The Great Escape", "Heat", "Chinatown", "Inside Out", "Pan's Labyrinth", "Ikiru", "My Neighbor Totoro", "On the Waterfront", "Room", "Ran", "The Gold Rush", "The Secret in Their Eyes", "The Bridge on the River Kwai", "Blade Runner", "Mr. Smith Goes to Washington", "The Seventh Seal", "Howl's Moving Castle", "Lock, Stock and Two Smoking Barrels", "Judgment at Nuremberg", "Casino", "The Bandit", "Incendies", "A Beautiful Mind", "A Wednesday", "The General", "The Elephant Man", "Wild Strawberries", "Arrival", "V for Vendetta", "Warrior", "The Wolf of Wall Street", "Manchester by the Sea", "Sunrise", "The Passion of Joan of Arc", "Gran Torino", "Rang De Basanti", "Trainspotting", "Dial M for Murder", "The Big Lebowski", "The Deer Hunter", "Tokyo Story", "Gone with the Wind", "Fargo", "Finding Nemo", "The Sixth Sense", "The Thing", "Hera Pheri", "Cool Hand Luke", "Andaz Apna Apna", "Rebecca", "No Country for Old Men", "How to Train Your Dragon", "Munna Bhai M.B.B.S.", "Sholay", "Kill Bill: Vol. 1", "Into the Wild", "Mary and Max", "Gone Girl", "There Will Be Blood", "Come and See", "It Happened One Night", "Life of Brian", "Rush", "Hotel Rwanda", "Platoon", "Shutter Island", "Network", "The Wages of Fear", "Stand by Me", "Wild Tales", "In the Name of the Father", "Spotlight", "Star Wars: The Force Awakens", "The Nights of Cabiria", "The 400 Blows", "Butch Cassidy and the Sundance Kid", "Mad Max: Fury Road", "The Maltese Falcon", "12 Years a Slave", "Ben-Hur", "The Grand Budapest Hotel", "Persona", "Million Dollar Baby", "Amores Perros", "Jurassic Park", "The Princess Bride", "Hachi: A Dog's Tale", "Memories of Murder", "Stalker", "Nausicaä of the Valley of the Wind", "Drishyam", "The Truman Show", "The Grapes of Wrath", "Before Sunrise", "Touch of Evil", "Annie Hall", "The Message", "Rocky", "Gandhi", "Harry Potter and the Deathly Hallows: Part 2", "The Bourne Ultimatum", "Diabolique", "Donnie Darko", "Monsters, Inc.", "Prisoners", "8½", "The Terminator", "The Wizard of Oz", "Catch Me If You Can", "Groundhog Day", "Twelve Monkeys", "Zootopia", "La Haine", "Barry Lyndon", "Jaws", "The Best Years of Our Lives", "Infernal Affairs", "Udaan", "The Battle of Algiers", "Strangers on a Train", "Dog Day Afternoon", "Sin City", "Kind Hearts and Coronets", "Gangs of Wasseypur", "The Help"],
        callbacks        : {
            add    : console.log,  // callback when adding a tag
            remove : console.log   // callback when removing a tag
        }
    });
})()
</script>