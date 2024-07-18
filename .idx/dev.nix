{ pkgs }:

{
  # Which nixpkgs channel to use.
  channel = "stable-23.11"; # or "unstable"
  
  # Use https://search.nixos.org/packages to find packages
  packages = [
    pkgs.php82
 
  ];

services.mysql = {
  enable = true;
  package = pkgs.mariadb;
};

  idx = {
    # Search for the extensions you want on https://open-vsx.org/ and use "publisher.id"
    extensions = [
      # "vscodevim.vim"
    ];


    # Enable previews and customize configuration
    previews = {
      enable = true;
      previews = {
        web = {
          command = ["php" "-S" "0.0.0.0:$PORT" "-t" "."];
          manager = "web";
        };
      };
    };
  };
}
