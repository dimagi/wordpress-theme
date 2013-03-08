from fabric.api import *
from fabric.contrib import console
from fabric import utils

env.code_repo = 'https://github.com/dimagi/wordpress-theme.git'
env.code_branch = 'master'
env.root = root = '/home/content/d/i/m/dimagi'
env.theme_root = theme = _join(root, 'html/wp/wp-content/themes')
env.sudo_user = 'dimagi'
env.hosts = ['dimagi.com']


def _join(*args):
    """
    We're deploying on Linux, so hard-code that path separator here.
    """
    return '/'.join(args)

def production():
    """ use production environment on dimagi.com"""
    env.repo_root = repo = _join(root, 'sites/wordpress-theme')
    env.theme_root = _join(theme, 'dimagi-4')
    env.environment = 'production'
    env.user = prompt("Username: ", default=env.user)
    
def staging():
    """ use staging environment on dimagi.com"""
    env.repo_root = repo = _join(root, 'sites/wordpress-theme-staging')
    env.theme_root = _join(theme, 'dimagi-beta')
    env.environment = 'staging'
    env.user = prompt("Username: ", default=env.user)


def deploy():
    """ Deploy to remote host. """
    require('root', provided_by=(env.environment))
    if env.environment == 'production':
        if not console.confirm('Are you sure you want to deploy from github to production?', default=False):
            utils.abort('Production deployment aborted.')

    with cd(env.repo_root):
      sudo('git pull --rebase', user=env.sudo_user)
      sudo('cp ', user=env.sudo_user)
        
 
    with cd(env.theme_root):
      sudo('rm -r output', user=env.sudo_user)
      sudo('rm -r tmp', user=env.sudo_user)
      sudo('nanoc compile', user=env.sudo_user)


def test():
    """ deploy code to remote host by checking out the latest via git """
    require('root', provided_by=('production'))
    if env.environment == 'production':
        if not console.confirm('Are you sure you want to deploy from github to production?', default=False):
            utils.abort('Production deployment aborted.')

    with cd(env.root):
        sudo('git pull --rebase', user=env.sudo_user)
 
    with cd(env.site_root):
      sudo('rm -r output', user=env.sudo_user)
      sudo('rm -r tmp', user=env.sudo_user)
      sudo('nanoc compile', user=env.sudo_user)