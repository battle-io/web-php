
<!-- Main body goes here -->
<div id="content" class="home">

<h2>Welcome</h2>
<p>
  The 2010 programming and cooperative knowledge (PACK) competition, sponsored by CU's <a href="http://eef.colorado.edu">Engineering Excellence Fund</a>, the <a href="http://amath.colorado.edu">Department of Applied Mathematics</a>, and <a href="http://code-wars.com">Code Wars</a> is proud to present this year's challenge: Bullshit!
</p>
<p>
  The objective of the PACK competition is to foster innovation in mathematics and artificial intelligence through an online coding competition, open to all students at the University of Colorado at Boulder. This year, we are excited to offer several great prizes from our sponsors:
  <ul>
    <li>Acme, Inc.</li>
  </ul>
</p>
<h2>Competition Rules</h2>
<p>
  The competition will open on Friday, 28<sup>th</sup> January 2011 at 5:00 PM, and will be divided into three phases:
  <ol>
    <li>
      Development Phase: 5:00 PM January 28<sup>th</sup> 2011 - 1:00 PM on January 30<sup>th</sup> 2011
      <ul>
        <li>
          During this phase, all competitors will be allowed to freely develop their algorithms and play in simulated game scenarios using PACK’s online development environment.
        </li>
      </ul>
    </li>
    <li>
      Open Competition: 1:00 PM on 30 January 2011 - 3:00 PM on 30 January 2011
      <ul>
        <li>
          During this phase, competitors’ bots will engage in free play against all bots in the challenge. Bots will be rated on their performance and assigned a rank.
        </li>
      </ul>
    </li>
    <li>
      Playoffs: 3:00 PM on 30 January 2011 - 5:00 PM on 30 January 2011
      <ul>
        <li>
          During the final phase of the competition, bots will be divided into three leagues, based on their ranks following the open competition. During this stage, scores will be reset, and final evaluation will be based on play among members of each league.
        </li>
      </ul>
    </li>
  </ol>
</p>
<p>
  During the development phase, players can engage their bots in online play as frequently or infrequently as they see fit. When playing online during the development phase, players will be provided with dummy bots against which their bots can play, to evaluate their in-game behavior.
</p>
<p>
  Throughout the open competition and playoffs, however, players are expected to keep their bots online for game-play, and bot unavailability will be penalized. During this time, the PACK moderator will automatically select groups of four bots to play in a series of games. Players can use the PACK tools to monitor the performance of their bots.
</p>
<h2>
  Game Description
</h2>
<p>
  The competition will consist of the card game ‘Bullshit’, which has several online descriptions, including:
  <ul>
    <li>
      <a href="http://www.pagat.com/beating/cheat.html">http://www.pagat.com/beating/cheat.html</a>
    </li>
    <li>
      <a href="http://en.wikipedia.org/wiki/Bullshit_(card_game)">http://en.wikipedia.org/wiki/Bullshit_(card_game)</a>
    </li>
  <ul>
</p>
<p>
  Although conceptually simple and accessible as a challenge, strong solutions require a strategy that consists of card-counting, statistical analysis, and gambling. Completely conservative solutions are not possible, as it is improbable for a player to be able to win a game without making a false claim.
</p>
<p>
  We hope that the game of Bullshit will be instantly recognizable by players, and note that it is possible to produce a working solution with only a few simple lines of code. Since the game provides imperfect information to each player, players are forced to design an algorithm fundamentally different from what they might see in the typical classroom.
</p>
<p>
  The specific rules to be used during the PACK competition are outlined in the next section.
</p>
<h2>
  Game Rules
</h2>
<h3>
  Objective
</h3>
<p>
  To start the game, one complete deck of cards without jokers is shuffled and distributed by the dealer to four players, such that each player receives 13 cards. The objective is to be the first player to successfully play all of your cards.
</p>
<h3>
  Gameplay
</h3>
<p>
  The game is round-based, and the first player and subsequent player order is determined randomly. During each round, the rank (value) of the card to be played by the player whose turn it is increases, then repeats. For example, in the first round, the player whose turn it is will play some number of aces. In the second round, the next player will play some number of twos, etc. After the thirteenth round (where the player plays kings), the next round will cycle back to aces.
</p>
<h3>
  Playing Cards
</h3>
<p>
  The player whose turn it is to play their cards must play at least one card, face-down on the table (invisible to other players). By playing these cards, the player makes a ‘claim’ consisting of the rank and number of cards thrown. However, the cards played by a player may consist of any cards, regardless of rank. For example, in the round of fives, the player may select to play the five of hearts and the five of diamonds if they are in their deck. In this case, the player has played truthfully, and in so doing, the player has made a claim of “two fives”. Similarly, the player could choose to play the five of hearts, five of diamonds, and two of clubs. In this case, the player has lied, making a claim of “three fives”.
</p>
<h3>
  Calling Bullshit
</h3>
<p>
  After a player has played their cards, the round is not over. At this time, all other players have the opportunity to challenge the claim by calling out “Bullshit”, or pass by calling out “Pass”.
</p>
<p>
  If the claim is challenged by any of the other players, there are two possible outcomes: 1) If the player making the claim lied about their cards (by playing a card value other than the value required by the round), then the claiming player (the “player”) must pick up all cards in the pile and add them to their deck. 2) If the player making the claim was truthful, the player who challenged the claim (the “challenger”) must pick up all cards in the pile and add them to their deck. In either case, the game moves uninterrupted to the next turn, where the next player plays the next-highest-valued card.
</p>
<p>
  Similarly, if the claim is not challenged, the next player plays the next-highest-valued card.
If more than one player chooses to call challenge the same claim, the priority is given to the challenger whose turn is scheduled to occur soonest. For example, if players three and four challenge a play made by player one, player three will be given priority. 
</p>
<h3>
  Finishing the Game
</h3>
<p>
  When a player has played their last card(s), as with all other rounds, the remaining players have the opportunity to challenge the call. The game is over when either: 1) No players challenge the call, or 2) The call is challenged by another player, and confirmed to be truthful.
</p>

</div>
<!-- END Main body -->
         </div> <!-- .yui-b for main -->
    </div><!-- #yui-main -->

