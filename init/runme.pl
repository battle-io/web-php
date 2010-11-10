#!/usr/bin/perl -w

use Fcntl ':mode';

# set the logs directory to be Read, Write, Execute by others
chmod S_IRWXU | S_IRWXO, 'application/logs';

#todo: guess path

print "what is the path we are deploying to?: ";
$path = <STDIN>;

chomp $path;
$path = "/$path" if $path !~ m|^/|;
$path .= "/" if $path !~ m|/$|;
print "path: $path\n";

# change the .htaccess to change the RewriteBase
print "Changing the Rewritebase for the .htaccess file\n";
changeSnack(".htaccess");

print "Changing the kohana config.php file\n";
changeSnack("application/config/config.php");

print "Changing the login.js script\n";
changeSnack("scripts/login.js");

print "Changing snack.js script\n";
changeSnack("scripts/snack.js");

print "Changing admin.js script\n";
changeSnack("scripts/admin.js");

print "Done\n";

sub changeSnack {
	my $file = shift;
	open(IN,$file) or die "can't open: $!";
	@in = <IN>;
	open(OUT,">$file");

	for($i=0;$i<=$#in;$i++) {
		$in[$i] =~ s|/snack/|$path|;
		print OUT $in[$i];
	}

	close IN;
	close OUT;
}
