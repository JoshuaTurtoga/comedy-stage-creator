const Footer = () => {
  return (
    <footer className="py-8 bg-card border-t border-border">
      <div className="container mx-auto px-4">
        <div className="flex flex-col md:flex-row items-center justify-between gap-4">
          <p className="font-display text-xl text-primary">MIKE COLLINS</p>
          <p className="text-muted-foreground text-sm">
            © {new Date().getFullYear()} Mike Collins. All rights reserved.
          </p>
        </div>
      </div>
    </footer>
  );
};

export default Footer;
