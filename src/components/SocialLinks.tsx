import { Youtube, Instagram, Facebook } from 'lucide-react';

const SocialLinks = () => {
  const socialLinks = [
    {
      icon: Youtube,
      url: 'https://www.youtube.com/@martinjakoubek116',
      label: 'YouTube'
    },
    {
      icon: Instagram,
      url: 'https://www.instagram.com/jaga_nos?igsh=MW1wcHZ4bnRwaTZxdQ==',
      label: 'Instagram'
    },
    {
      icon: Facebook,
      url: 'https://www.facebook.com/',
      label: 'Facebook'
    }
  ];

  return (
    <div className="fixed bottom-6 left-1/2 -translate-x-1/2 z-50 flex items-center gap-6">
      {socialLinks.map(({ icon: Icon, url, label }) => (
        <a
          key={label}
          href={url}
          target="_blank"
          rel="noopener noreferrer"
          className="text-foreground/60 hover:text-foreground transition-colors duration-300 hover:scale-110 transform"
          aria-label={label}
        >
          <Icon size={28} strokeWidth={1.5} />
        </a>
      ))}
    </div>
  );
};

export default SocialLinks;
