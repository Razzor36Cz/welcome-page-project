import { Link, useLocation } from 'react-router-dom';
import { Button } from '@/components/ui/button';
import { useLanguage, Language } from '@/contexts/LanguageContext';
import { useAuth } from '@/contexts/AuthContext';
import {
  DropdownMenu,
  DropdownMenuContent,
  DropdownMenuItem,
  DropdownMenuTrigger,
} from '@/components/ui/dropdown-menu';
import { Globe, Settings } from 'lucide-react';

const languages: Language[] = ['EN', 'FR', 'DE', 'CZ', 'PL'];

const Navigation = () => {
  const { t, language, setLanguage } = useLanguage();
  const { isAdmin, logout } = useAuth();
  const location = useLocation();

  const navItems = [
    { path: '/about', label: 'aboutMe' },
    { path: '/videos', label: 'videoGallery' },
    { path: '/music', label: 'music' },
    { path: '/prompt', label: 'prompt' },
  ];

  return (
    <nav className="fixed top-0 left-0 right-0 z-50 brushed-metal border-b border-aluminum/10">
      <div className="container mx-auto px-6 py-4">
        <div className="flex items-center justify-between">
          {/* Logo */}
          <Link 
            to="/home" 
            className="font-display text-xl aluminum-text tracking-wider"
          >
            JAGANOS AI
          </Link>

          {/* Navigation Links */}
          <div className="hidden md:flex items-center gap-8">
            {navItems.map((item) => (
              <Link key={item.path} to={item.path}>
                <Button 
                  variant={location.pathname === item.path ? 'navActive' : 'nav'}
                  size="sm"
                >
                  {t(item.label)}
                </Button>
              </Link>
            ))}
          </div>

          {/* Right Side - Language & Admin */}
          <div className="flex items-center gap-4">
            {/* Language Selector */}
            <DropdownMenu>
              <DropdownMenuTrigger asChild>
                <Button variant="ghost" size="sm" className="gap-2 text-muted-foreground hover:text-foreground">
                  <Globe className="w-4 h-4" />
                  <span className="text-xs tracking-wider">{language}</span>
                </Button>
              </DropdownMenuTrigger>
              <DropdownMenuContent className="bg-card border-border">
                {languages.map((lang) => (
                  <DropdownMenuItem
                    key={lang}
                    onClick={() => setLanguage(lang)}
                    className={`cursor-pointer ${language === lang ? 'aluminum-text' : ''}`}
                  >
                    {lang}
                  </DropdownMenuItem>
                ))}
              </DropdownMenuContent>
            </DropdownMenu>

            {/* Secret Admin Button */}
            {isAdmin ? (
              <div className="flex items-center gap-2">
                <Link to="/admin">
                  <Button variant="ghost" size="icon" className="text-aluminum">
                    <Settings className="w-4 h-4" />
                  </Button>
                </Link>
                <Button 
                  variant="ghost" 
                  size="sm" 
                  onClick={logout}
                  className="text-xs text-muted-foreground"
                >
                  {t('logout')}
                </Button>
              </div>
            ) : (
              <Link to="/admin-login">
                <Button 
                  variant="ghost" 
                  size="icon" 
                  className="opacity-10 hover:opacity-100 transition-opacity duration-500"
                >
                  <Settings className="w-3 h-3" />
                </Button>
              </Link>
            )}
          </div>
        </div>

        {/* Mobile Navigation */}
        <div className="md:hidden flex justify-center gap-4 mt-4 pb-2 overflow-x-auto">
          {navItems.map((item) => (
            <Link key={item.path} to={item.path}>
              <Button 
                variant={location.pathname === item.path ? 'navActive' : 'nav'}
                size="sm"
                className="text-[10px]"
              >
                {t(item.label)}
              </Button>
            </Link>
          ))}
        </div>
      </div>
    </nav>
  );
};

export default Navigation;
