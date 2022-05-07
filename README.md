# Personal website

>If you already have Homebrew, Xcode Command Line Tools, ruby (v3.0.X), Jekyll and Bundler installed, skip to step 4.

## 1. Install Homebrew and Xcode Command Line Tools
Type this command in your Terminal:
```
/bin/bash -c "$(curl -fsSL https://raw.githubusercontent.com/Homebrew/install/HEAD/install.sh)"
```

### Finalize Homebrew installation
Install Xcode Command Line Tools while installing Homebrew, or type `xcode-select --install` later.

After the installation, run the 2 commands in the **_Next steps_** section.
> Note: be sure to replace `[username]` with the username you use on your Mac.

```
echo 'eval "$(/opt/homebrew/bin/brew shellenv)"' >> /Users/[username]/.zprofile
eval "$(/opt/homebrew/bin/brew shellenv)"
export SDKROOT=$(xcrun --show-sdk-path)
```
### 2. Install Ruby 3.0.x
You can see the version of Ruby pre-installed with your Mac, by typing:

```
ruby -v
```

#### You will need to install your own copy of Ruby using Homebrew with the following command:

```
brew install ruby@3.0
```

#### Finalize Ruby installation

Type:

```
echo 'export PATH="/opt/homebrew/opt/ruby@3.0/bin:$PATH"' >> ~/.zshrc
```

Type `exit`

Quit terminal

#### Validate the installation of Ruby

Run terminal again and type `ruby -v`. Make sure it is ruby 3.0.x

### 3. Install Jekyll and Bundler

Type this command in your Terminal:
```
gem install --user-install bundler jekyll
```

>Make sure there is no error (red text) in the Terminal window after installation.

Type:
```
echo 'export PATH="$HOME/.gem/ruby/3.0.0/bin:$PATH"' >> ~/.zshrc
```

Then, type:
```
gem env
```
Look for the `GEM PATHS` section and make sure they all refer to 3.0.X

#### Validate the installation of Jekyll and Bundler

Create a folder for your new Jekyll site by typing:
```
cd desktop
mkdir jekylltest
cd jekylltest
```

Create a Jekyll site by typing:
```
bundle init
bundle add jekyll --version "~>4.2"
bundle config set --local path 'vendor/bundle'
bundle install
bundle exec jekyll new --force --skip-bundle .
bundle add webrick
bundle install --redownload
bundle update
```

Run the Jekyll site by typing:
```
bundle exec jekyll serve
```
Copy the resulting URL (it usually ends in 4000). Paste the text into a browser and the site should run!

If everything works as expected, you can delete the folder we just created.

### 4. Install dependencies

Go to the main project's directory

To install `node`, type:
```
brew install node
```

To install `yarn` (it is used to install dependencies), type:
```
brew install yarn
```

To install `imagemagick` (it is used to compress images), type:
```
brew install imagemagick
```

To install `gems` associated with the project, type:
```
bundle
```

To install every `node_module`, type:
```
yarn install
```

### 5. Run the website

To compress and copy the `src/assets` to the `assets/` on the website, type:
```
yarn gulp prepare
```

To start the Jekyll website, type:
```
bundle exec jekyll serve

or

yarn jekyllserve
```

To watch the `SCSS` and `JS` files, type:
```
yarn gulp watchSassJS
```
>Run this _while_ having the last command running too!

### 6. Make the website _production-ready_
Type:
```
JEKYLL_ENV=production bundle exec jekyll build

or

yarn jekyllprod
```

Then, type:
```
yarn gulp prod
```
