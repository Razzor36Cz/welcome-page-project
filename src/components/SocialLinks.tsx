import { Youtube, Instagram, Facebook } from 'lucide-react';

const SocialLinks = () => {
  const socialLinks = [
    {
      icon: Youtube,
      url: 'https://www.youtube.com/@martinjakoubek116',
      label: 'YouTube',
      color: '#FF0000',
      hoverColor: 'hover:drop-shadow-[0_0_8px_rgba(255,0,0,0.6)]'
    },
    {
      icon: Instagram,
      url: 'https://www.instagram.com/jaga_nos?igsh=MW1wcHZ4bnRwaTZxdQ==',
      label: 'Instagram',
      color: '#E4405F',
      hoverColor: 'hover:drop-shadow-[0_0_8px_rgba(228,64,95,0.6)]'
    },
    {
      icon: Facebook,
      url: 'https://www.facebook.com/profile.php?id=61582613908107',
      label: 'Facebook',
      color: '#1877F2',
      hoverColor: 'hover:drop-shadow-[0_0_8px_rgba(24,119,242,0.6)]'
    }
  ];

  return (
    <div className="fixed bottom-6 left-1/2 -translate-x-1/2 z-50 flex items-center gap-8">
      {socialLinks.map(({ icon: Icon, url, label, color, hoverColor }) => (
        <a
          key={label}
          href={url}
          target="_blank"
          rel="noopener noreferrer"
          className={`transition-all duration-300 hover:scale-125 transform ${hoverColor}`}
          aria-label={label}
        >
          <Icon size={40} strokeWidth={1.5} style={{ color }} />
        </a>
      ))}
    </div>
  );
};

export default SocialLinks;
